<header class="chat-header" id="active-user">
  <button id="mobileBack" type="button" class="button-icon mobile-back" aria-label="Back to conversations"><svg class="icon"><use href="#i-back"/></svg></button>
  <button id="btnCloseConversation" class="button-icon hide-small" type="button" aria-label="Close conversation" data-tooltip="Close conversation"><svg class="icon"><use href="#i-back"/></svg></button>
  <button class="active-contact" id="activeContactButton" type="button" aria-label="Open contact details">
    <span class="avatar avatar-lg" id="active-user-avatar" aria-hidden="true"></span>
    <span class="active-copy"><strong id="active-user-name"></strong><small id="active-user-status"></small></span>
  </button>
  <div class="chat-actions">
    <button id="btnMarkAnswered" class="button-resolve" type="button" aria-label="Mark answered"><svg class="icon"><use href="#i-check"/></svg><span>Mark answered</span></button>
    <button id="btnGetStudentsDetails" class="button-icon hide-small" type="button" aria-label="Open contact details" data-tooltip="Contact details"><svg class="icon"><use href="#i-info"/></svg></button>
  </div>
  <div style="display:none" id="active-user-email"></div>
  <div style="display:none" id="active-user-phone"></div>
</header>
