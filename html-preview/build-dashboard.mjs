import fs from 'node:fs';
import path from 'node:path';

const out = path.dirname(new URL(import.meta.url).pathname.replace(/^\/(?:[A-Za-z]:)/, m => m.slice(1)));
const write = (name, content) => fs.writeFileSync(path.join(out, name), content.trimStart() + '\n', 'utf8');

const links = [
  ['dashboard-index.html', 'Custom message'],
  ['template-index.html', 'Template messages'],
  ['messenger.html', 'Messenger'],
  ['trial-confirmed-form.html', 'Trial confirmation'],
  ['template-component-followup.html', 'Follow-up'],
  ['template-component-others.html', 'Other recipients'],
  ['template-component-booking_1person.html', 'One person booking'],
  ['template-component-booking_confirmation.html', 'Booking confirmation'],
  ['template-component-placementTest.html', 'Placement test'],
  ['template-component-teacher_availability.html', 'Teacher availability'],
  ['template-component-test_teacher_availability.html', 'Test teacher availability'],
];

const nav = links.map(([href, label]) => `<a href="${href}">${label}</a>`).join('');
const shell = (title, subtitle, body, source) => `<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>${title} · Local Blade preview</title>
  <link rel="stylesheet" href="dashboard.css">
  <script src="dashboard.js" defer></script>
</head>
<body>
  <header class="site-header"><div class="brand">WABA <span>local preview</span></div><nav aria-label="Preview pages">${nav}</nav></header>
  <main class="page">
    <div class="page-intro"><div><p class="eyebrow">Blade template preview</p><h1>${title}</h1><p>${subtitle}</p></div><span class="preview-badge">Demo data</span></div>
    ${body}
    <p class="source">Source: ${source}. Form submissions display locally and do not contact a server.</p>
  </main>
  <div id="preview-status" class="toast" role="status" aria-live="polite" hidden></div>
</body>
</html>`;

const options = (pairs) => pairs.map(([value,label]) => `<option value="${value}">${label}</option>`).join('');
const clients = options([['trial-1','Amina El Idrissi · +212 612 345 678'],['trial-2','Youssef Amrani · +212 633 234 567'],['trial-3','Sara Benali · +212 655 456 789']]);
const tutors = options([['tutor-1','Meryem B.'],['tutor-2','Omar T.'],['tutor-3','Fatima R.']]);
const days = options([['monday','Monday'],['tuesday','Tuesday'],['wednesday','Wednesday'],['thursday','Thursday'],['friday','Friday'],['saturday','Saturday'],['sunday','Sunday']]);
const hours = options([['09:00 AM','09:00 AM'],['10:00 AM','10:00 AM'],['11:00 AM','11:00 AM'],['02:00 PM','02:00 PM'],['03:00 PM','03:00 PM'],['04:00 PM','04:00 PM'],['05:00 PM','05:00 PM']]);
const courses = options([['english','English'],['french','French'],['arabic','Arabic']]);
const groups = options([['group-a','Morning group'],['group-b','Afternoon group'],['group-c','Weekend group']]);
const audiences = options([['all_students','All students'],['subscribed','Subscribed students'],['not_subscribed','Not subscribed students'],['not_active','Not active students'],['tutors','All tutors'],['active_tutors','Active tutors'],['not_active_tutors','Not active tutors'],['subscriptions','Subscribed to course'],['group','Subscribed to a group'],['custom_users','Custom users'],['outside_users','Outside users']]);

const field = (label, control, cls='') => `<div class="field ${cls}"><label>${label} <span class="required" aria-hidden="true">*</span>${control}</label></div>`;
const text = (name, placeholder, type='text') => `<input class="form-control" name="${name}" type="${type}" placeholder="${placeholder}" required>`;
const select = (name, choices, attrs='') => `<select class="form-select" name="${name}" ${attrs} required>${choices}</select>`;
const submit = `<div class="card-footer"><button class="btn btn-blue" type="submit">Send</button></div>`;
const form = (content, slug) => `<form class="preview-form" data-preview-form="${slug}">${content}${submit}</form>`;
const card = (heading, body, action='') => `<section class="card"><div class="card-header"><h2>${heading}</h2>${action}</div><div class="card-body">${body}</div></section>`;

const dayTime = (dayName='day_of_week') => `<div class="row two">${field('Day',select(dayName,days))}${field('Time',select('time',hours))}</div>`;
const linkField = field('Link',text('link','Enter a valid link','url'));
const phoneField = field('Phone',text('phone','Enter a valid phone','tel'));
const nameField = field('Name',text('name','Enter a valid name'));
const clientMultiple = field('Phone',select('tryouts[]',clients,'multiple size="3"'));

const audienceContent = `<div class="row">${field('Choose users',select('send_to',audiences,'data-audience'))}</div>
  <div class="conditional" data-audience-section="subscriptions" hidden>${field('Courses',select('subscriptions[]',courses,'multiple size="3"'))}</div>
  <div class="conditional row two" data-audience-section="group" hidden>${field('Courses',select('coursesHasGroups',courses,'data-course'))}${field('Group',select('group',groups))}</div>
  <div class="conditional" data-audience-section="phones" hidden>${field('Phone',select('phones[]',clients,'multiple size="3"'))}<p class="field-note">Choose demo contacts for custom users, or enter a number for outside users.</p>${field('Outside phone',text('outside_phone','+212 600 000 000','tel'))}</div>`;

const formBodies = {
  'followup': `<div class="row two">${nameField}${phoneField}</div><label class="checkbox"><input type="checkbox" data-group-toggle> Send to a group instead</label><div class="conditional" data-group-field hidden>${field('Group',select('group_id',groups))}</div>`,
  'others': audienceContent,
  'booking_1person': `<div class="row two">${nameField}${phoneField}</div><div class="row">${linkField}</div>${dayTime()}`,
  'booking_confirmation': `<div class="row two">${clientMultiple}${linkField}</div>${dayTime()}`,
  'placementTest': `<div class="row two">${phoneField}</div>`,
  'teacher_availability': `<div class="row">${field('Tutor',select('user_id',tutors))}</div>${dayTime()}<div class="row">${field('Client',select('tryout_id',clients))}</div>`,
  'test_teacher_availability': `<div class="row">${field('Tutor',select('user_id',tutors))}</div>${dayTime()}<div class="row">${field('Tryout',select('tryout_id',clients))}</div>`,
};

const formMeta = [
  ['followup','Follow-up'],['others','Other recipients'],['booking_1person','One person booking'],
  ['booking_confirmation','Booking confirmation'],['placementTest','Placement test'],
  ['teacher_availability','Teacher availability'],['test_teacher_availability','Test teacher availability']
];
for (const [slug,title] of formMeta) {
  const body = card(title, form(formBodies[slug], slug));
  write(`template-component-${slug}.html`, shell(title, 'Standalone copy of the template component with realistic sample choices.', body, `template/component/${slug}.blade.php`));
}

const templateChoices = options([
  ['followup','followup (APPROVED) (en)'],
  ['teacher_availability','teacher_availability_2 (APPROVED) (en)'],
  ['placementTest','placement_test_3 (APPROVED) (en)'],
  ['booking_confirmation','booking_confirmation (APPROVED) (en)'],
  ['booking_1person','booking_1person (APPROVED) (en)'],
  ['test_teacher_availability','test_teacher_availability (APPROVED) (en)'],
  ['others','other_template (APPROVED) (en)']
]);
const embedded = formMeta.map(([slug]) => `<template id="form-${slug}">${form(formBodies[slug],slug)}</template>`).join('');
write('template-index.html', shell('Send custom message', 'Select a template to preview its associated form.', card('Send custom message', `${field('Templates',select('template',`<option value="">Select a template</option>${templateChoices}`,'data-template-selector'))}<div id="templates-container" class="template-slot"><p class="empty-state">Choose a template above to see its message fields.</p></div>${embedded}`, '<button type="button" class="btn btn-outline" data-demo-refresh>Fetch templates</button>'), 'template/index.blade.php'));

const dashboardTemplates = options([['welcome','welcome (APPROVED) (en)'],['schedule','schedule_reminder (APPROVED) (en)'],['followup','followup (APPROVED) (en)']]);
const dashboardBody = field('Templates',select('template',dashboardTemplates)) + `<div id="templateWithoutAttributes">${audienceContent}</div>`;
write('dashboard-index.html', shell('Send custom message', 'A copy of the dashboard message form with local recipient selection.', card('Send custom message', form(dashboardBody, 'dashboard-index')), 'index.blade.php'));

write('trial-confirmed-form.html', shell('Trial confirmation', 'Trial booking fields from the Blade form fragment.', card('Trial confirmation', form(`<div class="row two">${clientMultiple}${linkField}</div>${dayTime('day')}`, 'trial-confirmed')), 'trial_confirmed_form.blade.php'));

const contacts = [['Amina El Idrissi','AE','trial-1'],['Youssef Amrani','YA','trial-2'],['Sara Benali','SB','trial-3']];
const contactList = contacts.map(([name,initials,id],i) => `<button class="contact ${i===0?'active':''}" type="button" data-contact="${id}" data-name="${name}"><span class="avatar">${initials}</span><span><strong>${name}</strong><small>${i===0?'Can we confirm tomorrow?':i===1?'Thank you for the update.':'I will be online at 3 PM.'}</small></span></button>`).join('');
write('messenger.html', shell('Messenger', 'A local conversation preview using the source two-column layout.', `<section class="messenger card"><aside class="contacts"><div class="contacts-heading"><h2>Chats</h2><span>3 demo contacts</span></div>${contactList}</aside><div class="chat-panel"><div class="chat-heading"><div class="avatar" id="active-avatar">AE</div><div><h2 id="active-name">Amina El Idrissi</h2><p>Demo conversation</p></div></div><div class="messages" id="messages" aria-live="polite"><div class="bubble received">Hello! Is my trial lesson still scheduled?</div><div class="bubble sent">Yes, your tutor is available tomorrow at 10:00 AM.</div><div class="bubble received">Can we confirm tomorrow?</div></div><form id="chat-form" class="chat-form"><label class="sr-only" for="chat-input">Message</label><input id="chat-input" name="body" type="text" placeholder="Write a message…" autocomplete="off" required><button type="submit" class="btn btn-blue">Send</button></form></div></section>`, 'messenger.blade.php'));

write('dashboard.css', `:root{--blue:#1662bd;--blue-dark:#114d95;--orange:#e68c30;--ink:#233349;--muted:#62748c;--line:#dce3eb;--surface:#fff;--canvas:#f4f6f9;--focus:#1880e8}*{box-sizing:border-box}html{font-family:Arial,Helvetica,sans-serif;color:var(--ink);background:var(--canvas)}body{margin:0;font-size:15px;line-height:1.5}button,input,select{font:inherit}button,a{cursor:pointer}a{color:var(--blue)}.site-header{background:#203d62;color:#fff;display:flex;align-items:center;gap:2rem;padding:1rem max(1rem,calc((100vw - 1180px)/2));border-bottom:4px solid var(--orange)}.brand{font-size:1.12rem;font-weight:800;white-space:nowrap}.brand span{font-size:.75rem;font-weight:400;opacity:.8;display:block}.site-header nav{display:flex;gap:.3rem;overflow:auto;white-space:nowrap;scrollbar-width:thin}.site-header nav a{color:#e7edf6;text-decoration:none;padding:.45rem .6rem;border-radius:4px;font-size:.84rem}.site-header nav a:hover,.site-header nav a:focus-visible{background:#315980;color:#fff}.page{max-width:1180px;margin:auto;padding:2rem 1rem 3rem}.page-intro{display:flex;justify-content:space-between;align-items:flex-start;gap:1rem;margin-bottom:1.25rem}.page-intro h1{font-size:1.7rem;margin:.2rem 0 .3rem}.page-intro p{margin:.1rem 0;color:var(--muted)}.eyebrow{text-transform:uppercase;letter-spacing:.12em;font-weight:700;font-size:.72rem!important;color:var(--blue)!important}.preview-badge{color:#6a481c;background:#fff2db;border:1px solid #f0d3a4;border-radius:4px;padding:.3rem .55rem;font-size:.78rem;white-space:nowrap}.card{background:var(--surface);border:1px solid var(--line);border-radius:5px;overflow:hidden;box-shadow:0 2px 7px #1734560a}.card-header{background:var(--blue);color:#fff;padding:.8rem 1rem;display:flex;align-items:center;justify-content:space-between;gap:1rem}.card-header h2{font-size:1.08rem;margin:0;font-weight:700}.card-body{padding:1.25rem}.row{display:grid;grid-template-columns:1fr;gap:1rem}.row.two{grid-template-columns:repeat(2,minmax(0,1fr))}.field{margin-bottom:1rem}.field label{display:block;font-weight:600;color:#33455b}.required{color:#d63333}.form-control,.form-select{display:block;width:100%;margin-top:.4rem;padding:.65rem .75rem;border:1px solid #cbd5e1;border-radius:4px;background:#fff;color:var(--ink);min-height:42px}.form-select[multiple]{height:auto}.form-control:hover,.form-select:hover{border-color:#9fb3ca}.form-control:focus,.form-select:focus{outline:2px solid var(--focus);outline-offset:1px;border-color:var(--focus)}.card-footer{border-top:1px solid var(--line);padding:1rem 1.25rem;display:flex;justify-content:flex-end}.btn{border:1px solid transparent;border-radius:4px;padding:.6rem 1rem;font-weight:700;min-width:100px}.btn-blue{background:var(--blue);color:#fff}.btn-blue:hover{background:var(--blue-dark)}.btn-outline{background:#fff;color:var(--blue);border-color:#fff}.btn-outline:hover{background:#e8f1fc}.source{font-size:.8rem;color:var(--muted);margin-top:1rem}.conditional{background:#f8fafc;border-left:3px solid #7ba4d5;padding:.75rem 1rem;margin-bottom:1rem}.conditional[hidden],.toast[hidden]{display:none}.field-note{font-size:.8rem;color:var(--muted);margin:.25rem 0 .75rem}.empty-state{padding:1.3rem;border:1px dashed #bdcbdc;background:#f8fafc;color:var(--muted);border-radius:4px}.template-slot{margin-top:1.25rem}.checkbox{display:flex;align-items:center;gap:.6rem;margin:0 0 1rem;font-weight:600}.checkbox input{width:17px;height:17px;accent-color:var(--blue)}.toast{position:fixed;right:1rem;bottom:1rem;z-index:10;background:#224b76;color:#fff;border-radius:5px;box-shadow:0 8px 24px #11182726;padding:.8rem 1rem;max-width:min(360px,calc(100vw - 2rem))}.messenger{display:grid;grid-template-columns:minmax(240px,310px) 1fr;min-height:560px}.contacts{border-right:1px solid var(--line);background:#f7f8fa}.contacts-heading{padding:1rem;border-bottom:1px solid var(--line)}.contacts-heading h2{margin:0;font-size:1.15rem}.contacts-heading span{color:var(--muted);font-size:.8rem}.contact{width:100%;padding:1rem;border:0;border-bottom:1px solid var(--line);background:transparent;display:flex;align-items:center;gap:.75rem;text-align:left;color:var(--ink)}.contact:hover,.contact.active{background:#e9f1fb}.contact strong,.contact small{display:block}.contact small{color:var(--muted);max-width:190px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.avatar{width:38px;height:38px;border-radius:50%;background:#97b7da;color:#163a66;font-weight:700;display:grid;place-items:center;flex:none}.chat-panel{display:flex;flex-direction:column;min-width:0}.chat-heading{display:flex;gap:.75rem;align-items:center;padding:1rem;border-bottom:1px solid var(--line)}.chat-heading h2{font-size:1rem;margin:0}.chat-heading p{margin:0;color:var(--muted);font-size:.78rem}.messages{padding:1.25rem;display:flex;flex-direction:column;gap:.8rem;flex:1;background:#fff;overflow:auto}.bubble{max-width:min(75%,340px);padding:.7rem .85rem;border-radius:7px}.received{background:#f1f3f6;align-self:flex-start}.sent{background:#b9e6be;align-self:flex-end}.chat-form{display:flex;gap:.75rem;padding:1rem;border-top:1px solid var(--line)}.chat-form input{flex:1;min-width:0;padding:.65rem .8rem;border-radius:22px;border:1px solid #cbd5e1}.chat-form input:focus{outline:2px solid var(--focus);outline-offset:1px}.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}@media(max-width:760px){.site-header{display:block}.site-header nav{margin-top:.7rem}.row.two{grid-template-columns:1fr}.messenger{grid-template-columns:1fr}.contacts{display:flex;overflow:auto;border-right:0;border-bottom:1px solid var(--line)}.contacts-heading{display:none}.contact{width:220px;flex:none;border-bottom:0;border-right:1px solid var(--line)}.page{padding-top:1.25rem}.preview-badge{display:none}}@media(max-width:400px){.page-intro h1{font-size:1.45rem}.card-body{padding:1rem}.card-header{display:block}.card-header .btn{margin-top:.75rem}.chat-form{padding:.75rem}.chat-form .btn{min-width:75px}}`);

write('dashboard.js', `(() => {
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
})();`);

console.log(`Wrote ${links.length} dashboard HTML previews and shared CSS/JS in ${out}`);
