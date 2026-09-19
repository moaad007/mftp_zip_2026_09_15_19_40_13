<footer id="formSendMessage" class="composer-shell">
  <div id="messageSelectionBar" class="message-selection-bar" role="toolbar" aria-label="Selected message actions" hidden>
    <div class="message-selection-summary"><span class="selection-summary-icon"><svg class="icon"><use href="#i-select"/></svg></span><strong id="messageSelectionCount">0 selected</strong></div>
    <div class="message-selection-actions">
      <button id="copySelectedMessages" class="button-icon" type="button" aria-label="Copy selected messages"><svg class="icon"><use href="#i-copy"/></svg></button>
      <button id="pinSelectedMessages" class="button-icon" type="button" aria-label="Pin selected messages"><svg class="icon"><use href="#i-pin"/></svg></button>
      <button id="deleteSelectedMessages" class="button-icon danger" type="button" aria-label="Delete selected messages"><svg class="icon"><use href="#i-trash"/></svg></button>
      <button id="clearMessageSelection" class="button-icon" type="button" aria-label="Cancel message selection"><svg class="icon"><use href="#i-close"/></svg></button>
    </div>
  </div>
  <div class="composer-inner">
    <div id="replyPreview" class="reply-preview" hidden><svg class="icon"><use href="#i-reply"/></svg><div><small>Replying to</small><strong id="replyText"></strong></div><button id="cancelReplyBtn" class="button-icon" type="button" aria-label="Cancel reply"><svg class="icon"><use href="#i-close"/></svg></button></div>
    <div id="attachmentPreview" class="attachment-preview" hidden><span id="attachmentPreviewIcon" class="attachment-preview-icon"></span><div class="attachment-preview-copy"><strong id="attachmentName"></strong><small id="attachmentMeta"></small><audio id="attachmentAudioPreview" class="attachment-audio-preview" controls preload="metadata" hidden></audio></div><button id="removeAttachmentBtn" class="button-icon" type="button" aria-label="Remove attachment"><svg class="icon"><use href="#i-close"/></svg></button></div>
    <div id="voiceRecorder" class="voice-recorder" data-phase="idle" role="group" aria-label="Voice recorder" hidden>
      <div class="voice-timer" aria-hidden="true"><span class="recording-live-dot"></span><time id="voiceRecorderTime" datetime="PT0S">0:00</time></div>
      <div class="voice-waveform" aria-hidden="true"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>
      <div class="voice-recorder-actions">
        <button id="pauseVoiceBtn" class="button-icon" type="button" aria-label="Pause voice recording" aria-pressed="false"><svg class="icon"><use href="#i-pause"/></svg></button>
        <button id="cancelVoiceBtn" class="button-icon voice-cancel" type="button" aria-label="Cancel voice recording"><svg class="icon"><use href="#i-close"/></svg></button>
        <button id="stopVoiceBtn" class="button-icon voice-stop" type="button" aria-label="Send voice message"><svg class="icon"><use href="#i-send"/></svg></button>
      </div>
    </div>
    <span id="voiceRecorderAnnouncement" class="sr-only" role="status" aria-live="polite"></span>
    <div class="composer-entry-row">
      <div class="composer-speed-dial">
        <button id="composerSpeedDialBtn" class="speed-dial-trigger" type="button" aria-label="Open message tools" aria-haspopup="menu" aria-expanded="false" aria-controls="composerSpeedDial">
          <svg class="icon" aria-hidden="true"><use href="#i-plus"/></svg>
        </button>
        <div id="composerSpeedDial" class="floating-panel speed-dial-menu" role="menu" aria-label="Message tools" hidden>
          <button id="typeInput" class="speed-dial-action channel-trigger" type="button" role="menuitem" value="WhatsApp" data-channel="whatsapp" aria-label="Message channel: WhatsApp" aria-haspopup="menu" aria-expanded="false" aria-controls="channelMenu">
            <span class="speed-dial-action-icon"><svg class="icon" aria-hidden="true"><use id="channelTriggerIconUse" href="#i-chat"/></svg></span>
            <span class="speed-dial-action-copy"><small>Send with</small><strong id="channelTriggerValue">WhatsApp</strong></span>
            <svg class="icon speed-dial-chevron" aria-hidden="true"><use href="#i-chevron"/></svg>
          </button>
          <button id="quickRepliesBtn" type="button" class="speed-dial-action" role="menuitem" aria-expanded="false" aria-controls="templatePanel">
            <span class="speed-dial-action-icon"><svg class="icon" aria-hidden="true"><use href="#i-template"/></svg></span>
            <span class="speed-dial-action-copy"><strong>Quick replies</strong><small>Insert a saved response</small></span>
          </button>
          <button id="sendGreetingBtn" type="button" class="speed-dial-action" role="menuitem" aria-label="Insert greeting">
            <span class="speed-dial-action-icon speed-dial-greeting" aria-hidden="true">&#x1F44B;</span>
            <span class="speed-dial-action-copy"><strong>Greeting</strong><small>Add the welcome message</small></span>
          </button>
        </div>
      </div>
      <form id="message-form" class="composer-form">
        <button id="attachmentBtn" class="composer-button" type="button" aria-label="Add attachment" aria-expanded="false" aria-controls="attachmentMenu"><svg class="icon"><use href="#i-paperclip"/></svg></button>
        <button id="btnEmoji" class="composer-button" type="button" aria-label="Choose emoji" aria-expanded="false" aria-controls="emojiPanel"><svg class="icon"><use href="#i-smile"/></svg></button>
        <label class="sr-only" for="messageInput">Message</label>
        <textarea dir="auto" id="messageInput" rows="1" maxlength="2000" placeholder="Write a message" aria-describedby="composerHint"></textarea>
        <button id="recordAudioBtn" class="composer-button record-button" type="button" aria-label="Record a voice message" aria-pressed="false" aria-controls="voiceRecorder"><svg class="icon"><use href="#i-mic"/></svg></button>
        <button id="sendMessage" type="submit" class="send-button" aria-label="Send message" disabled><svg class="icon"><use href="#i-send"/></svg></button>
      </form>
    </div>
    <div class="composer-foot"><span id="composerHint">Enter to send &middot; Shift + Enter for a new line</span><span id="draftCount">0 / 2000</span></div>
  </div>

  <div id="attachmentMenu" class="floating-panel action-panel composer-popup" role="menu" hidden>
    <p>Add to message</p>
    <button type="button" role="menuitem" data-attachment="image"><span class="action-icon image"><svg class="icon"><use href="#i-image"/></svg></span><span><strong>Photo or video</strong><small>JPG, PNG, GIF, MP4 &middot; sends instantly</small></span></button>
    <button type="button" role="menuitem" data-attachment="document"><span class="action-icon document"><svg class="icon"><use href="#i-file"/></svg></span><span><strong>Document</strong><small>PDF, DOCX, ZIP and more &middot; sends instantly</small></span></button>
    <button type="button" role="menuitem" data-attachment="audio"><span class="action-icon audio"><svg class="icon"><use href="#i-audio"/></svg></span><span><strong>Audio file</strong><small>MP3, M4A, WAV, OGG &middot; sends instantly</small></span></button>
  </div>
  <div id="channelMenu" class="floating-panel channel-menu composer-popup" role="menu" aria-labelledby="channelMenuTitle" hidden>
    <div class="panel-heading channel-menu-heading"><div><strong id="channelMenuTitle">Send with</strong><small>Choose a message channel</small></div><button id="channelMenuClose" class="button-icon" type="button" aria-label="Close message channel menu"><svg class="icon"><use href="#i-close"/></svg></button></div>
    <div class="channel-options">
      <button type="button" class="channel-option" role="menuitemradio" aria-checked="true" data-channel-value="WhatsApp" data-channel-key="whatsapp">
        <span class="channel-option-icon whatsapp"><svg class="icon"><use href="#i-chat"/></svg></span><span class="channel-option-copy"><strong>WhatsApp</strong><small>Direct conversation</small></span><span class="channel-option-check"><svg class="icon"><use href="#i-check"/></svg></span>
      </button>
      <button type="button" class="channel-option" role="menuitemradio" aria-checked="false" data-channel-value="WhatsApp Student Support" data-channel-key="support">
        <span class="channel-option-icon support"><svg class="icon"><use href="#i-support"/></svg></span><span class="channel-option-copy"><strong>Student Support</strong><small>WhatsApp support line</small></span><span class="channel-option-check"><svg class="icon"><use href="#i-check"/></svg></span>
      </button>
      <button type="button" class="channel-option" role="menuitemradio" aria-checked="false" data-channel-value="Email" data-channel-key="email">
        <span class="channel-option-icon email"><svg class="icon"><use href="#i-mail"/></svg></span><span class="channel-option-copy"><strong>Email</strong><small>Send as email</small></span><span class="channel-option-check"><svg class="icon"><use href="#i-check"/></svg></span>
      </button>
      <button type="button" class="channel-option" role="menuitemradio" aria-checked="false" data-channel-value="SMS" data-channel-key="sms">
        <span class="channel-option-icon sms"><svg class="icon"><use href="#i-sms"/></svg></span><span class="channel-option-copy"><strong>SMS</strong><small>Send as text message</small></span><span class="channel-option-check"><svg class="icon"><use href="#i-check"/></svg></span>
      </button>
    </div>
  </div>
  <div id="emojiPanel" class="floating-panel emoji-panel composer-popup" role="dialog" aria-modal="false" aria-labelledby="emojiPanelTitle" hidden>
    <div class="panel-heading"><div><strong id="emojiPanelTitle">Emoji library</strong><small>Unicode Emoji 17.0 &middot; 3,944 RGI sequences</small></div><button class="button-icon popup-close" type="button" aria-label="Close emoji picker"><svg class="icon"><use href="#i-close"/></svg></button></div>
    <label class="mini-search emoji-search" for="emojiSearchInput"><svg class="icon"><use href="#i-search"/></svg><input id="emojiSearchInput" type="search" placeholder="Search emoji" autocomplete="off"><button id="clearEmojiSearch" type="button" aria-label="Clear emoji search" hidden><svg class="icon"><use href="#i-close"/></svg></button></label>
    <div id="emojiTonePicker" class="emoji-tone-picker" aria-label="Skin tone"><span>Skin tone</span></div>
    <div id="emojiCategories" class="emoji-categories" role="tablist" aria-label="Emoji categories"></div>
    <div class="emoji-results-bar"><strong id="emojiCategoryLabel">Smileys &amp; emotion</strong><span id="emojiResultCount" role="status" aria-live="polite">0 emoji</span></div>
    <div id="emojiGrid" class="emoji-grid" role="group" aria-label="Emoji choices"></div>
    <div id="emojiEmpty" class="emoji-empty" hidden><span>?</span><strong>No emoji found</strong><small>Try another word or category.</small></div>
  </div>
  <div id="templatePanel" class="floating-panel template-panel composer-popup" hidden>
    <div class="panel-heading"><div><strong>Quick replies</strong><small>Insert and edit before sending</small></div><button class="button-icon popup-close" type="button" aria-label="Close quick replies"><svg class="icon"><use href="#i-close"/></svg></button></div>
    <label class="mini-search"><svg class="icon"><use href="#i-search"/></svg><input id="templateSearchInput" type="search" placeholder="Search replies" aria-label="Search quick replies"></label>
    <div id="templateList" class="template-list"></div>
  </div>
</footer>

<div id="fileInput" style="display:none">
  <input type="file" name="fileInput">
</div>
