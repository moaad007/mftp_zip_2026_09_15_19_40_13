(() => {
  const status = document.getElementById('preview-status');
  let toastTimer;
  const announce = message => { if (!status) return; status.textContent = message; status.hidden = false; clearTimeout(toastTimer); toastTimer = setTimeout(() => status.hidden = true, 4500); };
  const setRequired = (section, active) => { section.hidden = !active; section.querySelectorAll('select,input').forEach(control => { if (control.name !== 'outside_phone') control.required = active; }); };
  const updateAudience = select => {
    const root = select.closest('form'); if (!root) return;
    const value = select.value;
    root.querySelectorAll('[data-audience-section]').forEach(section => {
      const mode = section.dataset.audienceSection;
      const active = mode === 'subscriptions' ? value === 'subscriptions' : mode === 'group' ? value === 'group' : value === 'custom_users' || value === 'outside_users';
      setRequired(section, active);
      if (mode === 'phones') { const contacts = section.querySelector('select[name="phones[]"]'); const outside = section.querySelector('input[name="outside_phone"]'); if (contacts) contacts.required = value === 'custom_users'; if (outside) { outside.required = value === 'outside_users'; outside.closest('.field').hidden = value !== 'outside_users'; } }
    });
  };
  document.addEventListener('change', event => {
    if (event.target.matches('[data-audience]')) updateAudience(event.target);
    if (event.target.matches('[data-group-toggle]')) {
      const form = event.target.closest('form'); const group = form?.querySelector('[data-group-field]'); const identity = form?.querySelectorAll('input[name="name"], input[name="phone"]');
      if (group) setRequired(group, event.target.checked);
      identity?.forEach(input => { input.required = !event.target.checked; input.closest('.field').hidden = event.target.checked; });
    }
    if (event.target.matches('[data-template-selector]')) {
      const slot = document.getElementById('templates-container'); const template = document.getElementById('form-' + event.target.value);
      if (slot) { slot.replaceChildren(); if (template) { slot.append(template.content.cloneNode(true)); slot.querySelectorAll('[data-audience]').forEach(updateAudience); } else slot.innerHTML = '<p class="empty-state">Choose a template above to see its message fields.</p>'; }
    }
  });
  document.querySelectorAll('[data-audience]').forEach(updateAudience);
  document.addEventListener('submit', event => {
    if (event.target.id === 'chat-form') { event.preventDefault(); const input = document.getElementById('chat-input'); const messages = document.getElementById('messages'); if (!input?.value.trim() || !messages) return; const bubble = document.createElement('div'); bubble.className = 'bubble sent'; bubble.textContent = input.value.trim(); messages.append(bubble); input.value = ''; messages.scrollTop = messages.scrollHeight; input.focus(); return; }
    if (event.target.matches('.preview-form')) { event.preventDefault(); announce('Preview only: the form is valid. No message was sent.'); }
  });
  document.querySelector('[data-demo-refresh]')?.addEventListener('click', () => announce('Demo template list is ready. Select a template to preview its form.'));
  document.querySelectorAll('[data-contact]').forEach(button => button.addEventListener('click', () => {
    document.querySelectorAll('[data-contact]').forEach(item => item.classList.toggle('active', item === button));
    document.getElementById('active-name').textContent = button.dataset.name;
    document.getElementById('active-avatar').textContent = button.querySelector('.avatar')?.textContent || '';
    const messages = document.getElementById('messages'); messages.replaceChildren();
    const bubble = document.createElement('div'); bubble.className = 'bubble received'; bubble.textContent = button.querySelector('small')?.textContent || 'Hello!'; messages.append(bubble);
  }));
})();
