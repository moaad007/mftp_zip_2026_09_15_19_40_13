"use strict";

const STORAGE_KEY = "bec-whatsapp-modern-v2";
const $ = function (id) { return document.getElementById(id); };
const minutesAgo = function (value) { return new Date(Date.now() - value * 60000).toISOString(); };
const makeId = function (prefix) { return prefix + "-" + Date.now().toString(36) + "-" + Math.random().toString(36).slice(2, 8); };

const seedContacts = [
  {
    id: 1, name: "Amira El Mansouri", phone: "+212 612 345 678", email: "amira@example.com",
    category: "clients", online: true, unread: 2, unanswered: true, ai: false, blocked: false,
    course: "General English · B2", timezone: "Africa/Casablanca", tags: ["Trial lesson", "B2"], notes: "Prefers afternoon sessions.",
    messages: [
      { id: "a1", from: "incoming", body: "Hello, I would like to book an English trial lesson.", timestamp: minutesAgo(48), channel: "WhatsApp" },
      { id: "a2", from: "outgoing", body: "Hi Amira! We have a slot available on Thursday at 5 PM.", timestamp: minutesAgo(45), channel: "WhatsApp", status: "read" },
      { id: "a3", from: "incoming", body: "That works for me. Could you send the meeting link?", timestamp: minutesAgo(41), channel: "WhatsApp" },
      { id: "a4", from: "incoming", body: "I can also do Friday morning if Thursday is full.", timestamp: minutesAgo(38), channel: "WhatsApp" }
    ]
  },
  {
    id: 2, name: "Youssef Bennani", phone: "+212 634 729 188", email: "youssef@example.com",
    category: "clients", online: false, lastSeen: "Last seen 18 min ago", unread: 0, unanswered: false, ai: true, blocked: false,
    course: "Business English · C1", timezone: "Africa/Casablanca", tags: ["Subscribed", "C1"], notes: "",
    messages: [
      { id: "y1", from: "incoming", body: "Thank you for the course details.", timestamp: minutesAgo(1620), channel: "WhatsApp" },
      { id: "y2", from: "outgoing", body: "You are welcome! Let us know if you need anything else.", timestamp: minutesAgo(1600), channel: "WhatsApp", status: "delivered" }
    ]
  },
  {
    id: 3, name: "Leila El Idrissi", phone: "+212 677 883 219", email: "leila@example.com",
    category: "clients", online: false, lastSeen: "Last seen yesterday", unread: 1, unanswered: true, ai: false, blocked: false,
    course: "Conversation · B1", timezone: "Africa/Casablanca", tags: ["New lead", "B1"], notes: "Asked about weekend availability.",
    messages: [
      { id: "l1", from: "outgoing", body: "Here is the course brochure you requested.", timestamp: minutesAgo(2860), channel: "Email", status: "read" },
      { id: "l2", from: "incoming", body: "Thanks. Do you offer classes on Saturday?", timestamp: minutesAgo(1540), channel: "Email" }
    ]
  },
  {
    id: 4, name: "Sara Ait Ali", phone: "+212 666 104 443", email: "sara@example.com",
    category: "students", online: true, unread: 1, unanswered: true, ai: false, blocked: false,
    course: "Speaking Club · B2", timezone: "Africa/Casablanca", tags: ["Student", "Speaking"], notes: "",
    messages: [
      { id: "s1", from: "outgoing", body: "Your speaking session is confirmed for Thursday.", timestamp: minutesAgo(95), channel: "WhatsApp Student Support", status: "read" },
      { id: "s2", from: "incoming", body: "Can I move my class to Saturday?", timestamp: minutesAgo(72), channel: "WhatsApp Student Support" }
    ]
  },
  {
    id: 5, name: "Omar Belkadi", phone: "+212 611 442 901", email: "omar@example.com",
    category: "students", online: false, lastSeen: "Last seen 2 hours ago", unread: 0, unanswered: false, ai: false, blocked: false,
    course: "General English · A2", timezone: "Africa/Casablanca", tags: ["Student", "A2"], notes: "",
    messages: [
      { id: "o1", from: "outgoing", body: "Your next lesson is confirmed for Monday at 7 PM.", timestamp: minutesAgo(1810), channel: "WhatsApp Student Support", status: "delivered" }
    ]
  },
  {
    id: 6, name: "Meryem Zahra", phone: "+212 602 843 216", email: "meryem@example.com",
    category: "students", online: false, lastSeen: "Last seen Monday", unread: 0, unanswered: false, ai: true, blocked: false,
    course: "IELTS Preparation", timezone: "Africa/Casablanca", tags: ["Student", "IELTS"], notes: "Target score: 7.0.",
    messages: [
      { id: "m1", from: "incoming", body: "Where can I find this week’s homework?", timestamp: minutesAgo(4800), channel: "WhatsApp Student Support" },
      { id: "m2", from: "outgoing", body: "It is in your student portal under Resources.", timestamp: minutesAgo(4770), channel: "WhatsApp Student Support", status: "read" }
    ]
  },
  {
    id: 7, name: "Nadia Tutor", phone: "+212 621 550 227", email: "nadia.tutor@example.com",
    category: "tutors", online: true, unread: 0, unanswered: false, ai: false, blocked: false,
    course: "English Tutor", timezone: "Africa/Casablanca", tags: ["Tutor", "Available"], notes: "Usually available after 2 PM.",
    messages: [
      { id: "n1", from: "incoming", body: "I am available for the afternoon trial lesson.", timestamp: minutesAgo(122), channel: "WhatsApp" },
      { id: "n2", from: "outgoing", body: "Great, I have assigned the student to you.", timestamp: minutesAgo(110), channel: "WhatsApp", status: "read" }
    ]
  },
  {
    id: 8, name: "Rachid Tutor", phone: "+212 699 702 001", email: "rachid.tutor@example.com",
    category: "tutors", online: false, lastSeen: "Last seen 1 hour ago", unread: 1, unanswered: true, ai: false, blocked: false,
    course: "English Tutor", timezone: "Africa/Casablanca", tags: ["Tutor"], notes: "",
    messages: [
      { id: "r1", from: "incoming", body: "Could you confirm the student level?", timestamp: minutesAgo(67), channel: "WhatsApp" }
    ]
  }
];

const quickReplies = [
  { title: "Warm welcome", body: "Hello! Welcome to Boston English Center 👋 How can I help you today?" },
  { title: "Trial confirmation", body: "Your trial lesson is confirmed. I’ll send the meeting link and teacher details shortly." },
  { title: "Availability request", body: "Please share two days and times that work for you, and I’ll check the available teachers." },
  { title: "Course information", body: "I can help you choose the right course. What is your current English level and main goal?" },
  { title: "Follow-up", body: "Hi! I’m checking in to see if you still need help with your English course." }
];

const channelDefinitions = {
  "WhatsApp": { key: "whatsapp", icon: "i-chat" },
  "WhatsApp Student Support": { key: "support", icon: "i-support" },
  "Email": { key: "email", icon: "i-mail" },
  "SMS": { key: "sms", icon: "i-sms" }
};

const emojiCategoryDefinitions = [
  { id: "recent", label: "Recent", icon: "\uD83D\uDD58" },
  { id: "smileys", label: "Smileys & emotion", icon: "\uD83D\uDE00" },
  { id: "people", label: "People & body", icon: "\uD83D\uDC4B" },
  { id: "nature", label: "Animals & nature", icon: "\uD83D\uDC3B" },
  { id: "food", label: "Food & drink", icon: "\uD83C\uDF4E" },
  { id: "travel", label: "Travel & places", icon: "\uD83D\uDE97" },
  { id: "activities", label: "Activities", icon: "\u26BD" },
  { id: "objects", label: "Objects", icon: "\uD83D\uDCA1" },
  { id: "symbols", label: "Symbols", icon: "\u2764\uFE0F" },
  { id: "flags", label: "Flags", icon: "\uD83C\uDFF3\uFE0F" }
];
const emojiTones = [
  { value: "", label: "Default skin tone", glyph: "\uD83D\uDC4B" },
  { value: "\uD83C\uDFFB", label: "Light skin tone", glyph: "\uD83D\uDC4B\uD83C\uDFFB" },
  { value: "\uD83C\uDFFC", label: "Medium-light skin tone", glyph: "\uD83D\uDC4B\uD83C\uDFFC" },
  { value: "\uD83C\uDFFD", label: "Medium skin tone", glyph: "\uD83D\uDC4B\uD83C\uDFFD" },
  { value: "\uD83C\uDFFE", label: "Medium-dark skin tone", glyph: "\uD83D\uDC4B\uD83C\uDFFE" },
  { value: "\uD83C\uDFFF", label: "Dark skin tone", glyph: "\uD83D\uDC4B\uD83C\uDFFF" }
];

function humanizeEmojiAlias(alias) {
  const special = { "+1": "Thumbs up", "-1": "Thumbs down", "100": "Hundred points", "1234": "Input numbers", "us": "United States flag", "uk": "United Kingdom flag" };
  return special[alias] || alias.replace(/_/g, " ").replace(/\b\w/g, function (letter) { return letter.toUpperCase(); });
}

function emojiCodePoints(glyph) {
  return Array.from(glyph).map(function (character) { return character.codePointAt(0); });
}

function categorizeEmoji(glyph, aliases) {
  const words = aliases.join(" ").toLowerCase();
  const points = emojiCodePoints(glyph);
  const primary = points[0] || 0;
  const regionalCount = points.filter(function (point) { return point >= 0x1f1e6 && point <= 0x1f1ff; }).length;
  if (regionalCount >= 2 || (primary === 0x1f3f4 && points.some(function (point) { return point >= 0xe0061 && point <= 0xe007a; }))) return "flags";
  if (/(man|woman|person|people|boy|girl|baby|child|adult|hand|finger|thumb|clap|wave|muscle|leg|foot|ear|nose|eye|mouth|tongue|lips|brain|tooth|bone|hair|beard|pregnant|couple|family|dancer|runner|walking|student|teacher|worker|officer|guard|detective|ninja|prince|princess|bride|groom|superhero|villain|angel|santa|merperson|fairy|vampire|genie|zombie|mage|elf|shrug|facepalm|bust|selfie)/.test(words) || (primary >= 0x1f466 && primary <= 0x1f487)) return "people";
  if ((primary >= 0x1f600 && primary <= 0x1f64f) || (primary >= 0x1f910 && primary <= 0x1f92f) || (primary >= 0x1f970 && primary <= 0x1f97a) || /(smile|grin|laugh|joy|wink|blush|angry|rage|cry|sob|worried|confused|unamused|pensive|sleep|scream|fear|nause|vomit|sneeze|cowboy|clown|nerd|monocle|sunglasses|thinking|shushing|zipper|neutral|expressionless|astonished|flushed|dizzy|drool|yum|ghost|alien|robot|imp|poop)/.test(words)) return "smileys";
  if (/(dog|cat|mouse|hamster|rabbit|fox|bear|panda|koala|tiger|lion|cow|pig|frog|monkey|chicken|penguin|bird|eagle|duck|owl|bat|wolf|boar|horse|unicorn|bee|bug|butterfly|snail|beetle|ant|spider|turtle|snake|lizard|octopus|squid|shrimp|crab|fish|dolphin|whale|shark|crocodile|leopard|zebra|gorilla|elephant|rhino|camel|giraffe|kangaroo|badger|swan|peacock|parrot|lobster|mosquito|microbe|tree|flower|blossom|rose|tulip|sunflower|seedling|herb|leaf|cactus|palm|earth|moon|sun|star|cloud|rain|snow|lightning|tornado|fog|rainbow|ocean|volcano)/.test(words) || (primary >= 0x1f400 && primary <= 0x1f43f)) return "nature";
  if (/(apple|pear|orange|lemon|banana|watermelon|grape|strawberry|melon|cherries|peach|pineapple|kiwi|tomato|coconut|avocado|eggplant|potato|carrot|corn|pepper|cucumber|broccoli|mushroom|peanut|bread|croissant|baguette|pretzel|pancake|cheese|meat|bacon|hamburger|fries|pizza|sandwich|taco|burrito|egg|cooking|salad|popcorn|bento|rice|curry|ramen|spaghetti|sushi|dumpling|ice_cream|doughnut|cookie|cake|pie|chocolate|candy|lollipop|coffee|tea|sake|beer|wine|cocktail|champagne|drink|cup|bowl|fork|spoon|knife)/.test(words) || (primary >= 0x1f32d && primary <= 0x1f37f)) return "food";
  if (/(car|taxi|bus|trolley|race_car|police_car|ambulance|fire_engine|truck|tractor|scooter|bike|bicycle|motorcycle|railway|train|metro|tram|station|airplane|helicopter|rocket|satellite|canoe|boat|ship|ferry|anchor|fuel|construction|traffic|map|compass|mountain|camping|beach|desert|island|stadium|building|house|school|hospital|bank|hotel|church|mosque|synagogue|shrine|fountain|tent|city|sunrise|sunset|bridge|tower|statue)/.test(words) || (primary >= 0x1f680 && primary <= 0x1f6ff)) return "travel";
  if (/(soccer|basketball|football|baseball|softball|tennis|volleyball|rugby|pool|ping_pong|badminton|hockey|cricket|ski|snowboard|golf|surf|rowing|swim|boxing|martial|goal|skate|fishing|running|medal|trophy|rosette|ticket|circus|juggling|performing|art|clapper|microphone|headphones|musical|saxophone|guitar|piano|trumpet|violin|drum|game|joystick|dart|bowling|chess|slot_machine|puzzle|kite|yo_yo)/.test(words) || (primary >= 0x1f3a0 && primary <= 0x1f3ff)) return "activities";
  if (/(watch|phone|computer|keyboard|printer|mouse|trackball|camera|video|television|radio|stopwatch|timer|clock|hourglass|battery|plug|bulb|flashlight|candle|fire_extinguisher|money|dollar|credit|gem|tool|hammer|axe|pick|wrench|screwdriver|gear|clamp|scale|link|chain|magnet|gun|bomb|shield|smoking|coffin|urn|crystal|prayer|barber|alembic|telescope|microscope|hole|pill|syringe|bandage|stethoscope|door|bed|couch|chair|toilet|shower|bathtub|razor|lotion|safety_pin|broom|basket|paper|envelope|package|mailbox|pencil|pen|paintbrush|crayon|memo|briefcase|folder|calendar|clipboard|book|notebook|newspaper|bookmark|label|lock|key|bell|speaker|megaphone|speech_balloon|thought_balloon|card|mahjong|dice|teddy|thread|yarn|glasses|clothes|shoe|boot|hat|crown|ring|umbrella|luggage)/.test(words) || (primary >= 0x1f4a0 && primary <= 0x1f5ff)) return "objects";
  return "symbols";
}

function mixedEmojiToneDescription(signature) {
  const labels = Array.from(signature).map(function (value) {
    const tone = emojiTones[Number(value)];
    return tone ? tone.label.replace(/ skin tone$/i, "") : "";
  }).filter(Boolean);
  return labels.join(" and ") + " skin tones";
}

function buildEmojiCatalog() {
  if (Array.isArray(window.BEC_EMOJI_DATA) && window.BEC_EMOJI_DATA.length) {
    const catalog = [];
    window.BEC_EMOJI_DATA.forEach(function (record, index) {
      if (!record || typeof record.g !== "string" || !record.g) return;
      const aliases = Array.isArray(record.a) ? record.a.slice() : [];
      const name = record.n || (aliases[0] && humanizeEmojiAlias(aliases[0])) || "Emoji";
      const category = record.c || "symbols";
      const subgroup = record.s || "";
      const toneVariants = record.u && typeof record.u === "object" ? record.u : {};
      const allVariants = record.v && typeof record.v === "object" ? record.v : {};
      catalog.push({
        id: "emoji-" + index,
        glyph: record.g,
        aliases: aliases,
        name: name,
        category: category,
        subgroup: subgroup,
        toneVariants: toneVariants,
        allVariants: allVariants,
        toneable: Object.keys(toneVariants).length > 0,
        search: [name, subgroup].concat(aliases).join(" ").replace(/[_-]/g, " ").toLowerCase()
      });
      const uniformGlyphs = new Set(Object.values(toneVariants));
      Object.keys(allVariants).forEach(function (signature) {
        const glyph = allVariants[signature];
        if (!glyph || glyph === record.g || uniformGlyphs.has(glyph)) return;
        const toneDescription = mixedEmojiToneDescription(signature);
        const variantName = name + ", " + toneDescription;
        catalog.push({
          id: "emoji-" + index + "-mixed-" + signature,
          glyph: glyph,
          aliases: aliases,
          name: variantName,
          category: category,
          subgroup: subgroup,
          toneVariants: {},
          allVariants: {},
          toneable: false,
          mixedTone: true,
          search: [name, subgroup, toneDescription, "mixed skin tone"].concat(aliases).join(" ").replace(/[_-]/g, " ").toLowerCase()
        });
      });
    });
    return catalog;
  }
  const source = window.BEC_EMOJI_ALIASES || { smile: "\uD83D\uDE04", wave: "\uD83D\uDC4B", tada: "\uD83C\uDF89", heart: "\u2764\uFE0F" };
  const grouped = new Map();
  Object.keys(source).forEach(function (alias) {
    const glyph = source[alias];
    if (!glyph || typeof glyph !== "string") return;
    if (!grouped.has(glyph)) grouped.set(glyph, []);
    grouped.get(glyph).push(alias);
  });
  return Array.from(grouped.entries()).map(function (entry, index) {
    const glyph = entry[0];
    const aliases = entry[1].sort(function (a, b) { return b.length - a.length || a.localeCompare(b); });
    const bases = glyph.match(/\p{Emoji_Modifier_Base}/gu) || [];
    return { id: "emoji-" + index, glyph: glyph, aliases: aliases, name: humanizeEmojiAlias(aliases[0]), category: categorizeEmoji(glyph, aliases), toneVariants: {}, allVariants: {}, toneable: bases.length === 1, search: aliases.join(" ").replace(/_/g, " ").toLowerCase() };
  }).sort(function (a, b) { return a.category.localeCompare(b.category) || a.name.localeCompare(b.name); });
}
const emojiCatalog = buildEmojiCatalog();

const defaultState = {
  version: 2,
  contacts: seedContacts,
  activeId: 1,
  category: "clients",
  filter: "newest",
  theme: window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light",
  drafts: {},
  emojiTone: 0,
  emojiRecents: []
};

function clone(value) {
  return JSON.parse(JSON.stringify(value));
}

function loadState() {
  try {
    const saved = JSON.parse(localStorage.getItem(STORAGE_KEY));
    if (saved && saved.version === 2 && Array.isArray(saved.contacts) && saved.contacts.length) {
      return Object.assign(clone(defaultState), saved);
    }
  } catch (error) {
    console.warn("Could not load preview state.", error);
  }
  return clone(defaultState);
}

let state = loadState();
let replyTo = null;
let pendingAttachment = null;
let attachmentMode = "document";
let isComposing = false;
let lastDrawerTrigger = null;
let confirmResolver = null;
let noteSaveTimer = null;
let drawerInertRestore = null;
let activeEmojiCategory = "smileys";
let emojiCaret = { start: 0, end: 0 };
let activeMessageActionId = null;
let activeMessageActionContactId = null;
let activeMessageActionTrigger = null;
const selectedMessageIds = new Set();
const avatarTones = [
  ["#dcebe4", "#24533f"], ["#e3e9f3", "#315273"], ["#f5e5d7", "#7c4c23"],
  ["#eee3f4", "#654477"], ["#f3e2e5", "#824754"], ["#e8ead8", "#566126"]
];

function activeContact() {
  return state.contacts.find(function (contact) { return contact.id === state.activeId; }) || null;
}

function safeSave() {
  try {
    const persistable = clone(state);
    persistable.contacts.forEach(function (contact) {
      contact.messages.forEach(function (message) {
        if (message.attachment) {
          if (message.attachment.url && /^(data:|blob:)/.test(message.attachment.url)) delete message.attachment.url;
          delete message.attachment.blob;
        }
      });
    });
    localStorage.setItem(STORAGE_KEY, JSON.stringify(persistable));
  } catch (error) {
    console.warn("Could not save preview state.", error);
  }
}

function initials(name) {
  return name.split(/\s+/).filter(Boolean).slice(0, 2).map(function (part) { return part[0]; }).join("").toUpperCase();
}

function lastMessage(contact) {
  return contact.messages[contact.messages.length - 1] || null;
}

function relativeTime(timestamp) {
  if (!timestamp) return "";
  const date = new Date(timestamp);
  const diff = Math.max(0, Date.now() - date.getTime());
  const mins = Math.floor(diff / 60000);
  if (mins < 1) return "Now";
  if (mins < 60) return mins + "m";
  if (mins < 24 * 60) return Math.floor(mins / 60) + "h";
  if (mins < 48 * 60) return "Yesterday";
  return new Intl.DateTimeFormat("en", { month: "short", day: "numeric" }).format(date);
}

function messageTime(timestamp) {
  return new Intl.DateTimeFormat("en", { hour: "2-digit", minute: "2-digit" }).format(new Date(timestamp));
}

function messageDate(timestamp) {
  const date = new Date(timestamp);
  const now = new Date();
  if (date.toDateString() === now.toDateString()) return "Today";
  const yesterday = new Date(now);
  yesterday.setDate(now.getDate() - 1);
  if (date.toDateString() === yesterday.toDateString()) return "Yesterday";
  return new Intl.DateTimeFormat("en", { weekday: "short", month: "short", day: "numeric" }).format(date);
}

function fileSize(bytes) {
  if (!bytes) return "Attachment";
  if (bytes < 1024 * 1024) return Math.max(1, Math.round(bytes / 1024)) + " KB";
  return (bytes / (1024 * 1024)).toFixed(1) + " MB";
}

function formatDuration(totalSeconds) {
  const value = Math.max(0, Math.round(Number(totalSeconds) || 0));
  return Math.floor(value / 60) + ":" + String(value % 60).padStart(2, "0");
}

let mediaDbPromise = null;
const mediaUrlCache = new Map();
function openMediaDatabase() {
  if (!window.indexedDB) return Promise.reject(new Error("Media storage is unavailable"));
  if (mediaDbPromise) return mediaDbPromise;
  mediaDbPromise = new Promise(function (resolve, reject) {
    const request = indexedDB.open("bec-whatsapp-audio-v1", 1);
    request.addEventListener("upgradeneeded", function () {
      const database = request.result;
      if (!database.objectStoreNames.contains("clips")) database.createObjectStore("clips");
    });
    request.addEventListener("success", function () { resolve(request.result); });
    request.addEventListener("error", function () { reject(request.error || new Error("Could not open media storage")); });
    request.addEventListener("blocked", function () { reject(new Error("Media storage is blocked")); });
  }).catch(function (error) { mediaDbPromise = null; throw error; });
  return mediaDbPromise;
}
async function storeMediaBlob(id, blob) {
  const database = await openMediaDatabase();
  return new Promise(function (resolve, reject) {
    const transaction = database.transaction("clips", "readwrite");
    transaction.objectStore("clips").put(blob, id);
    transaction.addEventListener("complete", resolve);
    transaction.addEventListener("error", function () { reject(transaction.error || new Error("Could not save media")); });
    transaction.addEventListener("abort", function () { reject(transaction.error || new Error("Media save was cancelled")); });
  });
}
async function readMediaBlob(id) {
  if (!id) return null;
  const database = await openMediaDatabase();
  return new Promise(function (resolve, reject) {
    const request = database.transaction("clips", "readonly").objectStore("clips").get(id);
    request.addEventListener("success", function () { resolve(request.result || null); });
    request.addEventListener("error", function () { reject(request.error || new Error("Could not read media")); });
  });
}
async function deleteMediaBlob(id) {
  if (!id) return;
  if (mediaUrlCache.has(id)) {
    URL.revokeObjectURL(mediaUrlCache.get(id));
    mediaUrlCache.delete(id);
  }
  try {
    const database = await openMediaDatabase();
    await new Promise(function (resolve, reject) {
      const transaction = database.transaction("clips", "readwrite");
      transaction.objectStore("clips").delete(id);
      transaction.addEventListener("complete", resolve);
      transaction.addEventListener("error", function () { reject(transaction.error || new Error("Could not remove media")); });
    });
  } catch (error) { console.warn("Could not remove stored media.", error); }
}
function attachmentStorageId(attachment) {
  return attachment && (attachment.mediaId || attachment.audioId);
}
function isAudioAttachment(attachment) {
  return Boolean(attachment && (attachment.kind === "audio" || String(attachment.type || "").indexOf("audio/") === 0));
}
function isImageAttachment(attachment) {
  return Boolean(attachment && (attachment.kind === "image" || String(attachment.type || "").indexOf("image/") === 0));
}
function isVideoAttachment(attachment) {
  return Boolean(attachment && (attachment.kind === "video" || String(attachment.type || "").indexOf("video/") === 0));
}
function attachmentPreviewLabel(attachment) {
  if (isImageAttachment(attachment)) return "Photo";
  if (isVideoAttachment(attachment)) return "Video";
  if (isAudioAttachment(attachment)) return attachment && attachment.source === "recording" ? "Voice message" : "Audio";
  return "Document";
}
async function resolveMediaUrl(attachment) {
  if (!attachment) return null;
  if (attachment.url) return attachment.url;
  const id = attachmentStorageId(attachment);
  if (!id) return null;
  if (mediaUrlCache.has(id)) return mediaUrlCache.get(id);
  try {
    const blob = await readMediaBlob(id);
    if (!blob) return null;
    if (mediaUrlCache.has(id)) return mediaUrlCache.get(id);
    const url = URL.createObjectURL(blob);
    mediaUrlCache.set(id, url);
    return url;
  } catch (error) {
    console.warn("Could not load stored media.", error);
    return null;
  }
}
function pauseOtherMedia(current) {
  document.querySelectorAll("audio, video").forEach(function (other) {
    if (other !== current && !other.paused) other.pause();
  });
}
function createWaveformLayer(className) {
  const layer = document.createElement("span");
  layer.className = "audio-waveform-layer " + className;
  [9,15,22,13,28,18,11,24,31,17,26,12,21,29,16,25,10,20,27,14,23,18,30,13].forEach(function (height) {
    const bar = document.createElement("i");
    bar.style.height = height + "%";
    layer.append(bar);
  });
  return layer;
}
function createAudioAttachmentCard(attachment, senderName) {
  const card = document.createElement("div");
  card.className = "message-attachment audio-card";
  const isVoice = attachment.source === "recording" || /^voice message/i.test(attachment.name || "");
  card.classList.toggle("is-voice", isVoice);

  const heading = document.createElement("div");
  heading.className = "audio-card-heading";
  const mark = document.createElement("span");
  mark.className = "audio-card-mark";
  mark.append(makeIcon(isVoice ? "i-mic" : "i-audio"));
  const copy = document.createElement("div");
  copy.className = "audio-card-copy";
  const eyebrow = document.createElement("span");
  eyebrow.className = "audio-card-kicker";
  eyebrow.textContent = isVoice ? "Voice note" : "Audio";
  const title = document.createElement("strong");
  title.textContent = isVoice ? "Voice message" : (attachment.name || "Audio file");
  const detail = document.createElement("small");
  detail.textContent = fileSize(attachment.size);
  copy.append(eyebrow, title, detail);
  const speedButton = document.createElement("button");
  speedButton.type = "button";
  speedButton.className = "audio-speed";
  speedButton.textContent = "1×";
  speedButton.setAttribute("aria-label", "Playback speed, 1 times");
  heading.append(mark, copy, speedButton);

  const controls = document.createElement("div");
  controls.className = "audio-controls";
  const voiceAvatar = document.createElement("span");
  voiceAvatar.className = "audio-avatar";
  voiceAvatar.setAttribute("aria-hidden", "true");
  const voiceAvatarText = document.createElement("span");
  voiceAvatarText.textContent = initials(senderName === "you" ? "You" : senderName);
  const voiceMic = document.createElement("span");
  voiceMic.className = "audio-avatar-mic";
  voiceMic.append(makeIcon("i-mic"));
  voiceAvatar.append(voiceAvatarText, voiceMic);
  const playButton = document.createElement("button");
  playButton.type = "button";
  playButton.className = "audio-play";
  playButton.disabled = true;
  playButton.setAttribute("aria-label", "Play " + (isVoice ? "voice message" : attachment.name || "audio"));
  playButton.append(makeIcon("i-play"));

  const track = document.createElement("div");
  track.className = "audio-track";
  const waveform = document.createElement("div");
  waveform.className = "audio-waveform";
  const waveformBase = createWaveformLayer("is-base");
  const seek = document.createElement("input");
  seek.type = "range";
  seek.className = "audio-seek";
  seek.min = "0";
  seek.max = String(Math.max(0, Number(attachment.duration) || 0));
  seek.step = "0.01";
  seek.value = "0";
  seek.disabled = true;
  seek.setAttribute("aria-label", "Seek " + (isVoice ? "voice message" : attachment.name || "audio"));
  waveform.append(waveformBase, seek);

  const timing = document.createElement("div");
  timing.className = "audio-timing";
  const currentTime = document.createElement("time");
  currentTime.dateTime = "PT0S";
  currentTime.textContent = "0:00";
  const timingLine = document.createElement("span");
  const totalTime = document.createElement("time");
  const initialDuration = Math.max(0, Number(attachment.duration) || 0);
  totalTime.dateTime = "PT" + Math.round(initialDuration) + "S";
  totalTime.textContent = formatDuration(initialDuration);
  timing.append(currentTime, timingLine, totalTime);
  track.append(waveform, timing);
  if (isVoice) controls.append(voiceAvatar, playButton, track);
  else controls.append(playButton, track);

  const audio = document.createElement("audio");
  audio.className = "audio-engine";
  audio.preload = "metadata";
  audio.playsInline = true;
  const unavailable = document.createElement("div");
  unavailable.className = "audio-unavailable";
  unavailable.hidden = true;
  unavailable.setAttribute("role", "status");
  unavailable.setAttribute("aria-live", "polite");
  unavailable.textContent = "This audio could not be loaded.";

  let knownDuration = initialDuration;
  let speedIndex = 0;
  const speeds = [1, 1.5, 2];
  function setPlayIcon(symbol) {
    playButton.replaceChildren(makeIcon(symbol));
  }
  function updateProgress() {
    const current = Number.isFinite(audio.currentTime) ? audio.currentTime : 0;
    const actualDuration = Number.isFinite(audio.duration) && audio.duration !== Infinity ? audio.duration : knownDuration;
    if (actualDuration > 0) knownDuration = actualDuration;
    const progress = knownDuration > 0 ? Math.min(100, Math.max(0, current / knownDuration * 100)) : 0;
    seek.max = String(knownDuration || 0);
    seek.value = String(Math.min(current, knownDuration || current));
    seek.setAttribute("aria-valuetext", formatDuration(current) + " of " + formatDuration(knownDuration));
    waveform.style.setProperty("--audio-progress", progress + "%");
    const waveformBars = Array.from(waveformBase.querySelectorAll("i"));
    waveformBars.forEach(function (bar, index) {
      bar.classList.toggle("is-played", progress > 0 && index <= Math.floor(progress / 100 * Math.max(0, waveformBars.length - 1)));
    });
    currentTime.dateTime = "PT" + Math.round(current) + "S";
    currentTime.textContent = formatDuration(current);
    totalTime.dateTime = "PT" + Math.round(knownDuration) + "S";
    totalTime.textContent = formatDuration(knownDuration);
  }
  function setUnavailable() {
    playButton.disabled = true;
    seek.disabled = true;
    controls.hidden = true;
    speedButton.hidden = true;
    unavailable.hidden = false;
  }
  playButton.addEventListener("click", function () {
    if (audio.paused) {
      audio.play().catch(function () { setUnavailable(); });
    } else audio.pause();
  });
  speedButton.addEventListener("click", function () {
    speedIndex = (speedIndex + 1) % speeds.length;
    audio.playbackRate = speeds[speedIndex];
    speedButton.textContent = speeds[speedIndex] + "×";
    speedButton.setAttribute("aria-label", "Playback speed, " + speeds[speedIndex] + " times");
  });
  seek.addEventListener("input", function () {
    if (knownDuration > 0) {
      try { audio.currentTime = Math.min(knownDuration, Math.max(0, Number(seek.value))); } catch (error) { console.warn("Could not seek audio.", error); }
    }
    updateProgress();
  });
  seek.addEventListener("keydown", function (event) {
    if (!["ArrowLeft", "ArrowRight", "Home", "End"].includes(event.key) || !knownDuration) return;
    event.preventDefault();
    const next = event.key === "Home" ? 0 : event.key === "End" ? knownDuration : Math.min(knownDuration, Math.max(0, audio.currentTime + (event.key === "ArrowRight" ? 5 : -5)));
    audio.currentTime = next;
    updateProgress();
  });
  audio.addEventListener("loadedmetadata", function () {
    if (Number.isFinite(audio.duration) && audio.duration !== Infinity) knownDuration = audio.duration;
    playButton.disabled = false;
    seek.disabled = !(knownDuration > 0);
    updateProgress();
  });
  audio.addEventListener("canplay", function () { playButton.disabled = false; });
  audio.addEventListener("timeupdate", updateProgress);
  audio.addEventListener("durationchange", function () {
    updateProgress();
    seek.disabled = !(knownDuration > 0);
  });
  audio.addEventListener("play", function () {
    pauseOtherMedia(audio);
    card.classList.add("is-playing");
    setPlayIcon("i-pause");
    playButton.setAttribute("aria-label", "Pause " + (isVoice ? "voice message" : attachment.name || "audio"));
  });
  audio.addEventListener("pause", function () {
    card.classList.remove("is-playing");
    setPlayIcon("i-play");
    playButton.setAttribute("aria-label", "Play " + (isVoice ? "voice message" : attachment.name || "audio"));
  });
  audio.addEventListener("ended", function () {
    audio.currentTime = 0;
    updateProgress();
  });
  audio.addEventListener("error", setUnavailable);

  if (!isVoice) card.append(heading);
  card.append(controls, audio, unavailable);
  resolveMediaUrl(attachment).then(function (url) {
    if (!card.isConnected) return;
    if (!url) { setUnavailable(); return; }
    audio.src = url;
    audio.load();
  });
  updateProgress();
  return card;
}
function openMediaPreview(attachment, url, kind) {
  if (!url) return;
  const dialog = $("mediaPreviewDialog");
  const image = $("mediaPreviewImage");
  const video = $("mediaPreviewVideo");
  const playToggle = $("mediaPreviewPlay");
  video.pause();
  video.removeAttribute("src");
  image.removeAttribute("src");
  image.hidden = true;
  video.hidden = true;
  playToggle.hidden = true;
  playToggle.disabled = true;
  playToggle.replaceChildren(makeIcon("i-play"));
  playToggle.setAttribute("aria-label", "Play video preview");
  $("mediaPreviewTitle").textContent = kind === "video" ? "Video preview" : "Photo preview";
  const dimensions = attachment.width && attachment.height ? attachment.width + " × " + attachment.height + " · " : "";
  const duration = kind === "video" && attachment.duration ? formatDuration(attachment.duration) + " · " : "";
  $("mediaPreviewMeta").textContent = dimensions + duration + fileSize(attachment.size);
  if (kind === "video") {
    video.src = url;
    video.setAttribute("aria-label", attachment.name || "Video preview");
    video.hidden = false;
    playToggle.hidden = false;
    video.load();
  } else {
    image.src = url;
    image.alt = attachment.name || "Shared image";
    image.hidden = false;
  }
  if (!dialog.open) dialog.showModal();
}
function createImageAttachmentCard(attachment) {
  const button = document.createElement("button");
  button.type = "button";
  button.className = "message-attachment media-card image-card is-loading";
  button.setAttribute("aria-label", "Open image " + (attachment.name || ""));
  button.setAttribute("aria-busy", "true");
  const image = document.createElement("img");
  image.alt = attachment.name || "Shared image";
  image.loading = "lazy";
  const caption = document.createElement("span");
  caption.className = "media-card-caption";
  caption.append(makeIcon("i-image"), document.createTextNode("Photo"));
  const unavailable = document.createElement("span");
  unavailable.className = "media-card-unavailable";
  unavailable.hidden = true;
  unavailable.textContent = "Image unavailable";
  let resolvedUrl = "";
  image.addEventListener("load", function () { button.classList.remove("is-loading"); });
  image.addEventListener("error", function () {
    resolvedUrl = "";
    button.classList.remove("is-loading");
    button.disabled = true;
    button.setAttribute("aria-label", "Image unavailable");
    image.hidden = true;
    unavailable.hidden = false;
  });
  button.addEventListener("click", function () { if (resolvedUrl) openMediaPreview(attachment, resolvedUrl, "image"); });
  button.append(image, caption, unavailable);
  resolveMediaUrl(attachment).then(function (url) {
    if (!button.isConnected) return;
    button.setAttribute("aria-busy", "false");
    if (!url) {
      resolvedUrl = "";
      button.classList.remove("is-loading");
      button.disabled = true;
      button.setAttribute("aria-label", "Image unavailable");
      image.hidden = true;
      unavailable.hidden = false;
      return;
    }
    resolvedUrl = url;
    image.src = url;
  });
  return button;
}
function createVideoAttachmentCard(attachment) {
  const card = document.createElement("div");
  card.className = "message-attachment media-card video-card is-loading";
  card.setAttribute("aria-busy", "true");
  const video = document.createElement("video");
  video.controls = false;
  video.playsInline = true;
  video.preload = "metadata";
  video.setAttribute("aria-label", attachment.name || "Shared video");

  const playToggle = document.createElement("button");
  playToggle.type = "button";
  playToggle.className = "video-play";
  playToggle.disabled = true;
  playToggle.setAttribute("aria-label", "Play video");
  playToggle.append(makeIcon("i-play"));

  const expand = document.createElement("button");
  expand.type = "button";
  expand.className = "media-expand";
  expand.disabled = true;
  expand.setAttribute("aria-label", "Open video preview" + (attachment.name ? ": " + attachment.name : ""));
  expand.append(makeIcon("i-expand"));

  const caption = document.createElement("span");
  caption.className = "media-card-caption";
  caption.append(makeIcon("i-video"), document.createTextNode("Video"));
  const unavailable = document.createElement("span");
  unavailable.className = "media-card-unavailable";
  unavailable.hidden = true;
  unavailable.textContent = "Video unavailable or unsupported";
  let resolvedUrl = "";

  function updatePlayToggle() {
    const playing = !video.paused && !video.ended;
    playToggle.replaceChildren(makeIcon(playing ? "i-pause" : "i-play"));
    playToggle.setAttribute("aria-label", playing ? "Pause video" : "Play video");
    playToggle.classList.toggle("is-playing", playing);
  }
  function togglePlayback() {
    if (!resolvedUrl) return;
    if (video.paused || video.ended) {
      video.play().then(updatePlayToggle).catch(function () { unavailable.hidden = false; });
    } else {
      video.pause();
      updatePlayToggle();
    }
  }

  video.addEventListener("loadedmetadata", function () {
    card.classList.remove("is-loading");
    playToggle.disabled = false;
  });
  video.addEventListener("play", function () {
    pauseOtherMedia(video);
    updatePlayToggle();
  });
  video.addEventListener("playing", updatePlayToggle);
  video.addEventListener("pause", updatePlayToggle);
  video.addEventListener("ended", updatePlayToggle);
  video.addEventListener("click", togglePlayback);
  video.addEventListener("error", function () {
    card.classList.remove("is-loading");
    card.setAttribute("aria-busy", "false");
    video.hidden = true;
    playToggle.hidden = true;
    expand.hidden = true;
    unavailable.hidden = false;
  });
  playToggle.addEventListener("click", togglePlayback);
  expand.addEventListener("click", function () {
    if (!resolvedUrl) return;
    video.pause();
    openMediaPreview(attachment, resolvedUrl, "video");
  });
  card.append(video, playToggle, expand, caption, unavailable);
  resolveMediaUrl(attachment).then(function (url) {
    if (!card.isConnected) return;
    if (!url) {
      card.classList.remove("is-loading");
      card.setAttribute("aria-busy", "false");
      video.hidden = true;
      playToggle.hidden = true;
      expand.hidden = true;
      unavailable.hidden = false;
      return;
    }
    resolvedUrl = url;
    card.setAttribute("aria-busy", "false");
    expand.disabled = false;
    video.src = url;
    video.load();
  });
  return card;
}function createFileAttachmentCard(attachment) {
  const media = document.createElement("div");
  media.className = "message-attachment file-card";
  const fileMark = document.createElement("span");
  fileMark.className = "file-mark";
  fileMark.append(makeIcon("i-file"));
  const fileCopy = document.createElement("div");
  const fileName = document.createElement("strong");
  fileName.textContent = attachment.name || "File";
  const fileMeta = document.createElement("small");
  fileMeta.textContent = fileSize(attachment.size) + " · " + (attachment.type || "File");
  fileCopy.append(fileName, fileMeta);
  const download = document.createElement("a");
  download.className = "file-download";
  download.hidden = true;
  download.download = attachment.name || "attachment";
  download.setAttribute("aria-label", "Download " + (attachment.name || "attachment"));
  download.append(makeIcon("i-download"));
  media.append(fileMark, fileCopy, download);
  resolveMediaUrl(attachment).then(function (url) {
    if (!media.isConnected) return;
    if (!url) {
      media.classList.add("is-unavailable");
      fileMeta.textContent = "Unavailable · " + (attachment.type || "File");
      return;
    }
    download.href = url;
    download.hidden = false;
  });
  return media;
}
function makeIcon(symbol) {
  const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
  const use = document.createElementNS("http://www.w3.org/2000/svg", "use");
  svg.setAttribute("class", "icon");
  svg.setAttribute("aria-hidden", "true");
  use.setAttribute("href", "#" + symbol);
  svg.append(use);
  return svg;
}

function setAvatar(element, contact, index) {
  const tone = avatarTones[(index == null ? contact.id : index) % avatarTones.length];
  element.textContent = initials(contact.name);
  element.style.background = tone[0];
  element.style.color = tone[1];
}


function contactStatus(contact) {
  if (contact.blocked) return "Blocked";
  if (contact.online) return "Online now";
  return contact.lastSeen || "Offline";
}

function contactAssistant(contact) {
  if (contact.assistant) return contact.assistant;
  const assignments = {
    1: "trial-booking", 2: "subscription", 3: "trial-attending",
    4: "trial-attending", 5: "subscription", 6: "trial-booking",
    7: "trial-attending", 8: "trial-booking"
  };
  return assignments[contact.id] || "";
}

function normalizeConversationFilter(filter) {
  const aliases = { all: "newest", open: "unanswered" };
  const value = aliases[filter] || filter;
  return Object.prototype.hasOwnProperty.call(conversationFilterLabels, value) ? value : "newest";
}

function currentContacts() {
  const query = $("searchInput").value.trim().toLowerCase();
  const selectedFilter = normalizeConversationFilter(state.filter);
  return state.contacts
    .filter(function (contact) {
      if (contact.category !== state.category) return false;
      if (selectedFilter === "unread" && !contact.unread) return false;
      if (selectedFilter === "unanswered" && !contact.unanswered) return false;
      if (selectedFilter === "ai" && !contact.ai) return false;
      if (["trial-booking", "trial-attending", "subscription"].includes(selectedFilter) && contactAssistant(contact) !== selectedFilter) return false;
      if (!query) return true;
      const recent = lastMessage(contact);
      return [contact.name, contact.phone, contact.email, recent && recent.body].join(" ").toLowerCase().indexOf(query) >= 0;
    })
    .sort(function (a, b) {
      const aTime = lastMessage(a) ? new Date(lastMessage(a).timestamp).getTime() : 0;
      const bTime = lastMessage(b) ? new Date(lastMessage(b).timestamp).getTime() : 0;
      return bTime - aTime;
    });
}

const conversationFilterLabels = {
  newest: "Newest",
  unanswered: "Unanswered",
  unread: "Unread",
  ai: "AI",
  "trial-booking": "Trial Booking Assistant",
  "trial-attending": "Trial Attending Assistant",
  subscription: "Subscription Assistant"
};

function renderStatusFilter() {
  const selected = normalizeConversationFilter(state.filter);
  state.filter = selected;
  $("statusFilterLabel").textContent = conversationFilterLabels[selected];
  $("statusFilterBtn").classList.toggle("is-active", selected !== "newest");
  $("statusFilterBtn").setAttribute("aria-label", "Filter conversations: " + conversationFilterLabels[selected]);
  $("statusFilterBtn").title = "Filter: " + conversationFilterLabels[selected];
  $("statusFilterActive").hidden = selected === "newest";
  document.querySelectorAll("#statusFilterMenu [data-filter]").forEach(function (button) {
    button.setAttribute("aria-checked", String(button.dataset.filter === selected));
  });
}

function renderCounts() {
  ["clients", "students", "tutors"].forEach(function (category) {
    const target = document.querySelector("[data-count='" + category + "']");
    if (target) target.textContent = state.contacts.filter(function (contact) { return contact.category === category; }).length;
  });
  renderStatusFilter();
}

function renderContacts() {
  const container = $("contact-list");
  const contacts = currentContacts();
  container.replaceChildren();
  $("conversationCount").textContent = contacts.length;
  $("emptyContacts").hidden = contacts.length > 0;
  contacts.forEach(function (contact) {
    const option = document.createElement("button");
    option.type = "button";
    option.className = "contact-item";
    option.id = "contact-option-" + contact.id;
    option.setAttribute("role", "option");
    option.setAttribute("aria-selected", String(contact.id === state.activeId));
    option.classList.toggle("is-unread", Boolean(contact.unread));
    option.classList.toggle("needs-reply", Boolean(contact.unanswered));

    const avatarWrap = document.createElement("span");
    avatarWrap.className = "avatar-wrap";
    const avatar = document.createElement("span");
    avatar.className = "avatar contact-avatar";
    avatar.setAttribute("aria-hidden", "true");
    setAvatar(avatar, contact);
    const presence = document.createElement("span");
    presence.className = "presence-dot" + (contact.online ? " online" : "");
    presence.setAttribute("aria-label", contact.online ? "Online" : "Offline");
    avatarWrap.append(avatar, presence);

    const body = document.createElement("span");
    body.className = "contact-body";
    const top = document.createElement("span");
    top.className = "contact-row-top";
    const name = document.createElement("span");
    name.className = "contact-name";
    name.textContent = contact.name;
    const time = document.createElement("span");
    time.className = "contact-time";
    time.textContent = relativeTime(lastMessage(contact) && lastMessage(contact).timestamp);
    top.append(name, time);

    const previewRow = document.createElement("span");
    previewRow.className = "contact-preview-row";
    const preview = document.createElement("span");
    preview.className = "contact-preview";
    const latest = lastMessage(contact);
    if (state.drafts[contact.id]) {
      const draftPrefix = document.createElement("span");
      draftPrefix.className = "you";
      draftPrefix.textContent = "Draft: ";
      preview.append(draftPrefix, document.createTextNode(state.drafts[contact.id]));
    } else if (latest) {
      if (latest.from === "outgoing") {
        const you = document.createElement("span");
        you.className = "you";
        you.textContent = "You: ";
        preview.append(you);
      }
      preview.append(document.createTextNode(latest.body || (latest.attachment && attachmentPreviewLabel(latest.attachment)) || "Attachment"));
    } else {
      preview.textContent = "No messages yet";
    }
    previewRow.append(preview);
    if (contact.unread) {
      const badge = document.createElement("span");
      badge.className = "unread-badge";
      badge.textContent = contact.unread > 99 ? "99+" : contact.unread;
      badge.setAttribute("aria-label", contact.unread + " unread messages");
      previewRow.append(badge);
    }

    const meta = document.createElement("span");
    meta.className = "contact-meta";

    if (contact.unanswered) {
      const open = document.createElement("span");
      open.className = "status-label";
      open.textContent = "Needs reply";
      meta.append(open);
    }
    if (contact.ai) {
      const ai = document.createElement("span");
      ai.className = "status-label ai";
      ai.textContent = "AI assisted";
      meta.append(ai);
    }

    body.append(top, previewRow);
    if (meta.childElementCount) body.append(meta);
    option.append(avatarWrap, body);
    option.addEventListener("click", function () { selectContact(contact.id, true); });
    container.append(option);
  });
  renderCounts();
}

function appendHighlighted(element, text, query) {
  if (!query) {
    element.textContent = text;
    return;
  }
  const source = String(text);
  const lower = source.toLowerCase();
  let cursor = 0;
  let index = lower.indexOf(query);
  while (index >= 0) {
    if (index > cursor) element.append(document.createTextNode(source.slice(cursor, index)));
    const mark = document.createElement("mark");
    mark.textContent = source.slice(index, index + query.length);
    element.append(mark);
    cursor = index + query.length;
    index = lower.indexOf(query, cursor);
  }
  if (cursor < source.length) element.append(document.createTextNode(source.slice(cursor)));
}

function messageIdKey(value) {
  return String(value && typeof value === "object" ? value.id : value);
}

function messageGenericSummary(message) {
  const body = String(message && message.body || "").trim();
  if (body) return body;
  if (message && message.attachment) return attachmentPreviewLabel(message.attachment);
  return "Message";
}

function messageCopyText(message) {
  const parts = [];
  const body = String(message && message.body || "").trim();
  if (body) parts.push(body);
  if (message && message.attachment) parts.push("[" + attachmentPreviewLabel(message.attachment) + "]");
  return parts.join("\n") || "Message";
}

function announceMessageAction(message) {
  const region = $("messageActionAnnouncement");
  region.textContent = "";
  requestAnimationFrame(function () { region.textContent = message; });
}

async function copyPlainText(value) {
  if (navigator.clipboard && window.isSecureContext) await navigator.clipboard.writeText(value);
  else fallbackCopyText(value);
}

function messageActionContext() {
  const contact = state.contacts.find(function (item) { return item.id === activeMessageActionContactId; });
  if (!contact) return null;
  const message = contact.messages.find(function (item) { return messageIdKey(item) === activeMessageActionId; });
  return message ? { contact: contact, message: message } : null;
}

function closeMessageActionMenu(restoreFocus) {
  const menu = $("messageActionMenu");
  const trigger = activeMessageActionTrigger;
  if (trigger) trigger.setAttribute("aria-expanded", "false");
  menu.hidden = true;
  menu.style.removeProperty("left");
  menu.style.removeProperty("top");
  menu.style.removeProperty("visibility");
  $("messageActionBackdrop").hidden = true;
  activeMessageActionId = null;
  activeMessageActionContactId = null;
  activeMessageActionTrigger = null;
  if (restoreFocus && trigger && trigger.isConnected && !trigger.disabled) {
    requestAnimationFrame(function () { trigger.focus(); });
  }
}

function positionMessageActionMenu(trigger) {
  const menu = $("messageActionMenu");
  menu.style.removeProperty("left");
  menu.style.removeProperty("top");
  menu.style.removeProperty("visibility");
  menu.style.visibility = "hidden";
  const triggerRect = trigger.getBoundingClientRect();
  const menuRect = menu.getBoundingClientRect();
  const row = trigger.closest(".message-row");
  const outgoing = row && row.classList.contains("outgoing");
  const edge = 8;
  const gap = 6;
  let left = outgoing ? triggerRect.right - menuRect.width : triggerRect.left;
  let top = triggerRect.bottom + gap;
  if (top + menuRect.height > window.innerHeight - edge) top = triggerRect.top - menuRect.height - gap;
  left = Math.max(edge, Math.min(left, window.innerWidth - menuRect.width - edge));
  top = Math.max(edge, Math.min(top, window.innerHeight - menuRect.height - edge));
  menu.style.left = Math.round(left) + "px";
  menu.style.top = Math.round(top) + "px";
  menu.style.visibility = "";
}

function openMessageActionMenu(message, trigger) {
  const contact = activeContact();
  if (!contact || !message || !trigger) return;
  closeMessageActionMenu(false);
  closePanels("messageActionMenu");
  activeMessageActionId = messageIdKey(message);
  activeMessageActionContactId = contact.id;
  activeMessageActionTrigger = trigger;
  trigger.setAttribute("aria-expanded", "true");

  const preview = messageGenericSummary(message).replace(/\s+/g, " ").trim();
  $("messageActionPreview").textContent = preview.length > 54 ? preview.slice(0, 51) + "…" : preview;
  const pinButton = $("messageActionMenu").querySelector("[data-message-action='pin']");
  const selectButton = $("messageActionMenu").querySelector("[data-message-action='select']");
  pinButton.querySelector("[data-message-action-label]").textContent = message.pinned ? "Unpin message" : "Pin message";
  pinButton.setAttribute("aria-label", message.pinned ? "Unpin message" : "Pin message");
  const selected = selectedMessageIds.has(messageIdKey(message));
  selectButton.querySelector("[data-message-action-label]").textContent = selected ? "Deselect message" : "Select message";
  selectButton.setAttribute("aria-label", selected ? "Deselect message" : "Select message");

  $("messageActionMenu").hidden = false;
  $("messageActionBackdrop").hidden = true;
  positionMessageActionMenu(trigger);
  requestAnimationFrame(function () {
    const menu = $("messageActionMenu");
    if (menu.hidden || activeMessageActionTrigger !== trigger) return;
    const first = menu.querySelector("[role='menuitem']:not(:disabled)");
    if (first) first.focus();
  });
}

function validSelectedMessages() {
  const contact = activeContact();
  if (!contact) return [];
  return contact.messages.filter(function (message) { return selectedMessageIds.has(messageIdKey(message)); });
}

function renderMessageSelectionBar() {
  const messages = validSelectedMessages();
  const active = messages.length > 0;
  const bar = $("messageSelectionBar");
  const composer = $("formSendMessage").querySelector(".composer-inner");
  bar.hidden = !active;
  composer.hidden = active;
  $("formSendMessage").classList.toggle("has-message-selection", active);
  $("messages-container").classList.toggle("is-selection-mode", active);
  $("messageSelectionCount").textContent = messages.length + " selected";
  const allPinned = active && messages.every(function (message) { return Boolean(message.pinned); });
  const pinButton = $("pinSelectedMessages");
  pinButton.setAttribute("aria-label", allPinned ? "Unpin selected messages" : "Pin selected messages");
  pinButton.title = allPinned ? "Unpin selected" : "Pin selected";
}

function focusRenderedMessageControl(messageId, selector) {
  const key = messageIdKey(messageId);
  requestAnimationFrame(function () {
    const control = Array.from(document.querySelectorAll(selector)).find(function (item) {
      return item.dataset.messageId === key;
    });
    if (control) control.focus();
  });
}

function clearMessageSelection(shouldRender, restoreFocus) {
  const hadSelection = selectedMessageIds.size > 0;
  selectedMessageIds.clear();
  if (shouldRender === false) renderMessageSelectionBar();
  else renderMessages(false);
  if (restoreFocus && hadSelection) {
    requestAnimationFrame(function () {
      const target = $("messageInput").disabled ? $("mobileBack") : $("messageInput");
      if (target && target.getClientRects().length) target.focus();
    });
  }
}

function toggleMessageSelection(messageId) {
  const key = messageIdKey(messageId);
  const enteringSelection = selectedMessageIds.size === 0 && !selectedMessageIds.has(key);
  if (enteringSelection && voiceSession) cancelVoiceRecording(true);
  if (selectedMessageIds.has(key)) selectedMessageIds.delete(key);
  else selectedMessageIds.add(key);
  renderMessages(false);
  const selector = selectedMessageIds.size ? ".message-selection-toggle" : ".message-menu-trigger";
  focusRenderedMessageControl(key, selector);
}

async function copySelectedMessages() {
  const contact = activeContact();
  const messages = validSelectedMessages();
  if (!contact || !messages.length) return;
  const text = messages.map(function (message) {
    const sender = message.from === "outgoing" ? "You" : contact.name;
    return sender + " · " + messageTime(message.timestamp) + "\n" + messageCopyText(message);
  }).join("\n\n");
  try {
    await copyPlainText(text);
    announceMessageAction(messages.length + (messages.length === 1 ? " message copied." : " messages copied."));
  } catch (error) {
    announceMessageAction("Could not copy the selected messages.");
  }
}

function togglePinSelectedMessages() {
  const messages = validSelectedMessages();
  if (!messages.length) return;
  const shouldPin = messages.some(function (message) { return !message.pinned; });
  messages.forEach(function (message) { message.pinned = shouldPin; });
  safeSave();
  renderMessages(false);
  announceMessageAction(messages.length + (messages.length === 1 ? " message " : " messages ") + (shouldPin ? "pinned." : "unpinned."));
}

async function removeMessageAttachmentResources(messages) {
  const storageIds = new Set();
  const uncachedBlobUrls = new Set();
  messages.forEach(function (message) {
    const attachment = message && message.attachment;
    if (!attachment) return;
    const storageId = attachmentStorageId(attachment);
    const url = attachment.url;
    if (storageId) storageIds.add(storageId);
    if (url && String(url).indexOf("blob:") === 0 && (!storageId || mediaUrlCache.get(storageId) !== url)) uncachedBlobUrls.add(url);
  });
  for (const storageId of storageIds) await deleteMediaBlob(storageId);
  uncachedBlobUrls.forEach(function (url) {
    try { URL.revokeObjectURL(url); } catch (error) { console.warn("Could not release attachment URL.", error); }
  });
}

async function deleteMessageRecord(contactId, messageId) {
  const contact = state.contacts.find(function (item) { return item.id === contactId; });
  if (!contact) return false;
  const key = messageIdKey(messageId);
  const index = contact.messages.findIndex(function (message) { return messageIdKey(message) === key; });
  if (index < 0) return false;
  const message = contact.messages[index];
  await removeMessageAttachmentResources([message]);
  contact.messages.splice(index, 1);
  selectedMessageIds.delete(key);
  if (replyTo && messageIdKey(replyTo) === key) {
    replyTo = null;
    renderReplyPreview();
  }
  safeSave();
  if (state.activeId === contact.id) {
    renderContacts();
    renderHeader();
    renderMessages(false);
  }
  announceMessageAction("Message deleted.");
  return true;
}

async function requestDeleteMessage(contactId, messageId) {
  const confirmed = await askConfirmation({
    title: "Delete this message?",
    description: "This removes the message from this local conversation.",
    accept: "Delete message"
  });
  if (!confirmed) {
    focusRenderedMessageControl(messageId, ".message-menu-trigger");
    return false;
  }
  return deleteMessageRecord(contactId, messageId);
}

async function deleteSelectedMessages() {
  const contact = activeContact();
  const messages = validSelectedMessages();
  if (!contact || !messages.length) return;
  const count = messages.length;
  const confirmed = await askConfirmation({
    title: "Delete " + count + (count === 1 ? " message?" : " messages?"),
    description: "This removes the selected " + (count === 1 ? "message" : "messages") + " from this local conversation.",
    accept: count === 1 ? "Delete message" : "Delete messages"
  });
  if (!confirmed) {
    requestAnimationFrame(function () { $("deleteSelectedMessages").focus(); });
    return;
  }
  const keys = new Set(messages.map(messageIdKey));
  await removeMessageAttachmentResources(messages);
  contact.messages = contact.messages.filter(function (message) { return !keys.has(messageIdKey(message)); });
  if (replyTo && keys.has(messageIdKey(replyTo))) {
    replyTo = null;
    renderReplyPreview();
  }
  selectedMessageIds.clear();
  safeSave();
  renderContacts();
  renderHeader();
  renderMessages(false);
  announceMessageAction(count + (count === 1 ? " message deleted." : " messages deleted."));
  requestAnimationFrame(function () {
    if (!$("messageInput").disabled) $("messageInput").focus();
  });
}

async function handleMessageAction(action) {
  const context = messageActionContext();
  if (!context) {
    closeMessageActionMenu(false);
    return;
  }
  const contactId = context.contact.id;
  const message = context.message;
  const key = messageIdKey(message);

  if (action === "reply") {
    closeMessageActionMenu(false);
    setReply(message);
    announceMessageAction("Reply ready.");
    requestAnimationFrame(function () { $("messageInput").focus(); });
    return;
  }
  if (action === "copy") {
    try {
      await copyPlainText(messageCopyText(message));
      announceMessageAction("Message copied.");
    } catch (error) {
      announceMessageAction("Could not copy this message.");
    }
    closeMessageActionMenu(true);
    return;
  }
  if (action === "pin") {
    const shouldPin = !message.pinned;
    message.pinned = shouldPin;
    closeMessageActionMenu(false);
    safeSave();
    renderMessages(false);
    announceMessageAction(shouldPin ? "Message pinned." : "Message unpinned.");
    focusRenderedMessageControl(key, ".message-menu-trigger");
    return;
  }
  if (action === "select") {
    closeMessageActionMenu(false);
    toggleMessageSelection(key);
    announceMessageAction(selectedMessageIds.has(key) ? "Message selected." : "Message deselected.");
    return;
  }
  if (action === "delete") {
    closeMessageActionMenu(false);
    await requestDeleteMessage(contactId, key);
  }
}

function renderMessages(forceBottom) {
  const contact = activeContact();
  const container = $("messages-container");
  const scroller = $("boxMessagesScroll");
  const wasNearBottom = scroller.scrollHeight - scroller.scrollTop - scroller.clientHeight < 110;
  const query = $("messageSearchInput").value.trim().toLowerCase();
  closeMessageActionMenu(false);

  const availableIds = new Set(contact ? contact.messages.map(messageIdKey) : []);
  Array.from(selectedMessageIds).forEach(function (id) {
    if (!availableIds.has(id)) selectedMessageIds.delete(id);
  });
  renderMessageSelectionBar();
  container.replaceChildren();

  if (!contact || !contact.messages.length) {
    selectedMessageIds.clear();
    renderMessageSelectionBar();
    const empty = document.createElement("div");
    empty.className = "thread-empty";
    const mark = document.createElement("span");
    mark.textContent = "💬";
    const title = document.createElement("h2");
    title.textContent = "Start the conversation";
    const text = document.createElement("p");
    text.textContent = "Write a message below or use a quick reply to get started.";
    empty.append(mark, title, text);
    container.append(empty);
    $("searchResultsCount").textContent = "0 results";
    return;
  }

  const visible = query ? contact.messages.filter(function (message) {
    return [message.body, message.channel, message.attachment && message.attachment.name].join(" ").toLowerCase().indexOf(query) >= 0;
  }) : contact.messages;
  $("searchResultsCount").textContent = visible.length + (visible.length === 1 ? " result" : " results");

  if (!visible.length) {
    const empty = document.createElement("div");
    empty.className = "thread-empty";
    const mark = document.createElement("span");
    mark.textContent = "⌕";
    const title = document.createElement("h2");
    title.textContent = "No matching messages";
    const text = document.createElement("p");
    text.textContent = "Try another word or close conversation search.";
    empty.append(mark, title, text);
    container.append(empty);
    return;
  }

  let currentDate = "";
  visible.forEach(function (message, index) {
    const key = messageIdKey(message);
    const dateLabel = messageDate(message.timestamp);
    if (dateLabel !== currentDate) {
      const divider = document.createElement("div");
      divider.className = "date-separator";
      const label = document.createElement("span");
      label.textContent = dateLabel;
      divider.append(label);
      container.append(divider);
      currentDate = dateLabel;
    }

    const row = document.createElement("article");
    row.className = "message-row " + message.from;
    row.dataset.messageId = key;
    row.classList.toggle("is-selected", selectedMessageIds.has(key));
    row.classList.toggle("is-pinned", Boolean(message.pinned));
    row.setAttribute("aria-selected", String(selectedMessageIds.has(key)));
    row.setAttribute("aria-label", (message.from === "outgoing" ? "You" : contact.name) + " at " + messageTime(message.timestamp));

    if (message.from === "incoming") {
      const avatar = document.createElement("span");
      avatar.className = "message-avatar";
      avatar.textContent = initials(contact.name);
      avatar.setAttribute("aria-hidden", "true");
      row.append(avatar);
    }

    const stack = document.createElement("div");
    stack.className = "message-stack";
    const previous = visible[index - 1];
    if (!previous || previous.from !== message.from || previous.channel !== message.channel) {
      const sender = document.createElement("div");
      sender.className = "message-sender";
      sender.textContent = (message.from === "outgoing" ? "You" : contact.name) + " · " + message.channel;
      stack.append(sender);
    }

    const bubble = document.createElement("div");
    bubble.className = "message-bubble";

    const actionTrigger = document.createElement("button");
    actionTrigger.type = "button";
    actionTrigger.className = "message-menu-trigger";
    actionTrigger.dataset.messageId = key;
    actionTrigger.setAttribute("aria-label", "Message actions");
    actionTrigger.setAttribute("aria-haspopup", "menu");
    actionTrigger.setAttribute("aria-expanded", "false");
    actionTrigger.setAttribute("aria-controls", "messageActionMenu");
    actionTrigger.title = "Message actions";
    actionTrigger.append(makeIcon("i-chevron"));
    actionTrigger.addEventListener("click", function (event) {
      event.stopPropagation();
      openMessageActionMenu(message, actionTrigger);
    });
    bubble.append(actionTrigger);

    if (message.reply) {
      const reply = document.createElement("div");
      reply.className = "bubble-reply";
      const label = document.createElement("small");
      label.textContent = "Reply";
      const excerpt = document.createElement("span");
      excerpt.textContent = message.reply;
      reply.append(label, excerpt);
      bubble.append(reply);
    }

    if (message.attachment) {
      if (isAudioAttachment(message.attachment)) {
        row.classList.add("has-audio");
        bubble.append(createAudioAttachmentCard(message.attachment, message.from === "outgoing" ? "you" : contact.name));
      } else if (isImageAttachment(message.attachment)) {
        row.classList.add("has-media");
        bubble.append(createImageAttachmentCard(message.attachment));
      } else if (isVideoAttachment(message.attachment)) {
        row.classList.add("has-media");
        bubble.append(createVideoAttachmentCard(message.attachment));
      } else {
        row.classList.add("has-file");
        bubble.append(createFileAttachmentCard(message.attachment));
      }
    }

    if (message.body) {
      const paragraph = document.createElement("p");
      paragraph.dir = "auto";
      appendHighlighted(paragraph, message.body, query);
      bubble.append(paragraph);
    }

    const meta = document.createElement("div");
    meta.className = "message-meta";
    if (message.pinned) {
      const pinned = document.createElement("span");
      pinned.className = "message-pin-mark";
      pinned.setAttribute("aria-label", "Pinned");
      pinned.title = "Pinned";
      pinned.append(makeIcon("i-pin"), document.createTextNode("Pinned"));
      meta.append(pinned);
    }
    const time = document.createElement("time");
    time.dateTime = message.timestamp;
    time.textContent = messageTime(message.timestamp);
    meta.append(time);
    if (message.from === "outgoing") {
      const delivery = document.createElement("span");
      delivery.className = "delivery " + (message.status || "sent");
      delivery.textContent = message.status === "read" ? "✓✓" : message.status === "delivered" ? "✓✓" : message.status === "failed" ? "Failed" : message.status === "sending" ? "…" : "✓";
      delivery.setAttribute("aria-label", message.status || "sent");
      meta.append(delivery);
    }
    bubble.append(meta);
    stack.append(bubble);
    row.append(stack);

    if (selectedMessageIds.size) {
      const selectionButton = document.createElement("button");
      const isSelected = selectedMessageIds.has(key);
      selectionButton.type = "button";
      selectionButton.className = "message-selection-toggle";
      selectionButton.dataset.messageId = key;
      selectionButton.setAttribute("aria-label", isSelected ? "Deselect message" : "Select message");
      selectionButton.setAttribute("aria-pressed", String(isSelected));
      selectionButton.append(makeIcon(isSelected ? "i-check" : "i-select"));
      selectionButton.addEventListener("click", function () { toggleMessageSelection(key); });
      row.append(selectionButton);
    }

    container.append(row);
  });

  requestAnimationFrame(function () {
    if (forceBottom || wasNearBottom) {
      scroller.scrollTop = scroller.scrollHeight;
      $("scrollLatestBtn").hidden = true;
    }
  });
}
function renderHeader() {
  const contact = activeContact();
  $("chatEmpty").hidden = Boolean(contact);
  $("chatView").hidden = !contact;
  if (!contact) return;
  setAvatar($("active-user-avatar"), contact);
  $("active-user-name").textContent = contact.name;
  $("active-user-status").textContent = contactStatus(contact);
  const markAnsweredButton = $("btnMarkAnswered");
  markAnsweredButton.hidden = !contact.unanswered;
  markAnsweredButton.classList.remove("is-resolved");
  markAnsweredButton.querySelector("span").textContent = "Mark answered";
  $("mobileMarkAnsweredBtn").hidden = !contact.unanswered;
  $("blockedBanner").hidden = !contact.blocked;
  $("blockMenuLabel").textContent = contact.blocked ? "Unblock contact" : "Block contact";
  const blockButton = $("btnBlockUser");
  blockButton.querySelector("span").textContent = contact.blocked ? "Unblock contact" : "Block contact";
  $("formSendMessage").classList.toggle("is-blocked", contact.blocked);
  $("messageInput").disabled = contact.blocked;
  $("attachmentBtn").disabled = contact.blocked;
  $("btnEmoji").disabled = contact.blocked;
  $("quickRepliesBtn").disabled = contact.blocked;
  updateComposer();
  renderDrawer();
}

const overviewCategoryDefaults = {
  clients: {
    eyebrow: "Client overview",
    sectionLabels: { subscription: "Subscription", attendance: "Trials and appointments", learning: "Interests and materials" },
    summary: { labels: ["Stage", "Next step", "Last contact"], values: ["New lead", "Follow up", "No activity"] },
    profile: { level: "Not assessed", dashboardState: "Lead", emailVerified: true },
    alerts: [],
    subscriptions: [],
    attendance: {
      totals: { hours: 0, present: 0, absent: 0, practice: 0 }, pattern: "",
      cycle: { label: "No active cycle", note: "A cycle will appear after enrollment.", totals: { hours: 0, present: 0, absent: 0, practice: 0 }, pattern: "" }
    },
    scheduleActions: [
      { title: "Book trial session", detail: "No trial session is scheduled yet.", enabled: false },
      { title: "Assign a tutor", detail: "Choose a tutor after the level is confirmed.", enabled: false }
    ],
    classes: [],
    learning: { canTakeExam: "Not yet", certificateCount: 0, materials: [], certificates: [], tests: [] }
  },
  students: {
    eyebrow: "Student overview",
    sectionLabels: { subscription: "Subscription", attendance: "Classes and attendance", learning: "Learning" },
    summary: { labels: ["Group", "Remaining sessions", "Attendance"], values: ["Not assigned", "0", null] },
    profile: { level: "Not assessed", dashboardState: "Active", emailVerified: true },
    alerts: [],
    subscriptions: [],
    attendance: {
      totals: { hours: 0, present: 0, absent: 0, practice: 0 }, pattern: "",
      cycle: { label: "No payment cycle found", note: "Attendance starts with the first class.", totals: { hours: 0, present: 0, absent: 0, practice: 0 }, pattern: "" }
    },
    scheduleActions: [
      { title: "Postpone upcoming session", detail: "No upcoming assigned session is available.", enabled: false },
      { title: "Change schedule", detail: "No upcoming assigned group is available.", enabled: false }
    ],
    classes: [],
    learning: { canTakeExam: "No", certificateCount: 0, materials: [], certificates: [], tests: [] }
  },
  tutors: {
    eyebrow: "Tutor overview",
    sectionLabels: { subscription: "Engagement", attendance: "Classes and attendance", learning: "Teaching and materials" },
    summary: { labels: ["Active groups", "Upcoming sessions", "Attendance"], values: ["0", "0", null] },
    profile: { level: "Tutor", dashboardState: "Active", emailVerified: true },
    alerts: [],
    subscriptions: [],
    attendance: {
      totals: { hours: 0, present: 0, absent: 0, practice: 0 }, pattern: "",
      cycle: { label: "Current month", note: "No teaching sessions recorded.", totals: { hours: 0, present: 0, absent: 0, practice: 0 }, pattern: "" }
    },
    scheduleActions: [
      { title: "Review upcoming session", detail: "No upcoming session needs attention.", enabled: false },
      { title: "Update availability", detail: "Availability can be updated from the tutor workspace.", enabled: true }
    ],
    classes: [],
    learning: { canTakeExam: "Up to date", certificateCount: 0, materials: [], certificates: [], tests: [] }
  }
};

const overviewContactProfiles = {
  1: {
    summary: { values: ["Trial lead", "Thu · 5 PM", "48 min ago"] },
    profile: { level: "B2 · Upper intermediate", dashboardState: "Trial requested" },
    alerts: [{ tone: "info", title: "Trial request ready", body: "Amira confirmed Thursday at 5 PM. Send the meeting link when the tutor is assigned." }],
    attendance: {
      totals: { hours: 1, present: 1, absent: 0, practice: 0 }, pattern: "p",
      cycle: { label: "Trial period", note: "One attended discovery session.", totals: { hours: 1, present: 1, absent: 0, practice: 0 }, pattern: "p" }
    },
    scheduleActions: [
      { title: "Confirm trial lesson", detail: "Thursday at 5 PM is available.", enabled: true },
      { title: "Assign a tutor", detail: "Match Amira with a B2 tutor.", enabled: true }
    ],
    classes: [{ name: "B2 trial lesson", meta: "Thursday · 5:00 PM", status: "Awaiting link" }],
    learning: {
      canTakeExam: "After trial", certificateCount: 0,
      materials: [{ name: "B2 course brochure", meta: "Course overview", url: "https://bostonenglish.example/materials/b2-brochure" }],
      certificates: [], tests: []
    }
  },
  2: {
    summary: { values: ["Subscribed", "Renew Sep 28", "Yesterday"] },
    profile: { level: "C1 · Advanced", dashboardState: "Active" },
    subscriptions: [{ name: "Business English C1", meta: "7 sessions remaining · renews Sep 28", status: "Active" }],
    attendance: {
      totals: { hours: 35, present: 33, absent: 2, practice: 4 }, pattern: "ppppppapppppppappp",
      cycle: { label: "Sep 1 – Sep 30", note: "7 sessions remaining.", totals: { hours: 9, present: 8, absent: 1, practice: 2 }, pattern: "ppppapppp" }
    },
    scheduleActions: [
      { title: "Postpone upcoming session", detail: "Next class is Tuesday at 6 PM.", enabled: true },
      { title: "Change schedule", detail: "Current schedule: Tue and Thu.", enabled: true }
    ],
    classes: [{ name: "Business English C1", meta: "Tuesday & Thursday · 6:00 PM", status: "Active" }],
    learning: {
      canTakeExam: "Yes", certificateCount: 1,
      materials: [{ name: "C1 business vocabulary", meta: "Updated this week", url: "https://bostonenglish.example/materials/c1-business" }],
      certificates: [{ name: "Business English B2", meta: "Completed", url: "https://bostonenglish.example/certificates/youssef-b2" }],
      tests: [{ name: "C1 progress test", score: 86 }]
    }
  },
  3: {
    summary: { values: ["New lead", "Saturday follow-up", "Yesterday"] },
    profile: { level: "B1 · Intermediate", dashboardState: "Needs reply", emailVerified: false },
    alerts: [{ tone: "warning", title: "Email verification required", body: "Confirm Leila’s email before sending class links and account notifications." }],
    scheduleActions: [
      { title: "Offer Saturday trial", detail: "The contact asked for weekend availability.", enabled: true },
      { title: "Assign a tutor", detail: "Confirm the trial time first.", enabled: false }
    ],
    classes: [],
    learning: {
      canTakeExam: "Not yet", certificateCount: 0,
      materials: [{ name: "B1 weekend course guide", meta: "Share after follow-up", url: "https://bostonenglish.example/materials/b1-weekend" }],
      certificates: [], tests: []
    }
  },
  4: {
    summary: { values: ["Speaking Club B2", "8", null] },
    profile: { level: "B2 · Upper intermediate", dashboardState: "Active" },
    subscriptions: [{ name: "Speaking Club", meta: "8 sessions remaining · renews Oct 12", status: "Active" }],
    attendance: {
      totals: { hours: 25, present: 22, absent: 3, practice: 6 }, pattern: "ppppapppppappppappp",
      cycle: { label: "Sep 4 – Oct 12", note: "8 sessions remaining.", totals: { hours: 8, present: 7, absent: 1, practice: 2 }, pattern: "pppapppp" }
    },
    scheduleActions: [
      { title: "Postpone upcoming session", detail: "Thursday’s speaking session can be moved.", enabled: true },
      { title: "Change schedule", detail: "A Saturday group has availability.", enabled: true }
    ],
    classes: [{ name: "Speaking Club B2", meta: "Thursday · 7:00 PM", status: "Active" }],
    learning: {
      canTakeExam: "Yes", certificateCount: 1,
      materials: [{ name: "Speaking prompts · Unit 6", meta: "Class material", url: "https://bostonenglish.example/materials/speaking-b2-unit-6" }],
      certificates: [{ name: "General English B1", meta: "Issued Jun 2026", url: "https://bostonenglish.example/certificates/sara-b1" }],
      tests: [{ name: "B2 speaking review", score: 88 }]
    }
  },
  5: {
    summary: { values: ["General English A2", "5", null] },
    profile: { level: "A2 · Elementary", dashboardState: "Active" },
    subscriptions: [{ name: "General English A2", meta: "5 sessions remaining · renews Sep 30", status: "Active" }],
    attendance: {
      totals: { hours: 34, present: 32, absent: 2, practice: 3 }, pattern: "pppppppapppppppappp",
      cycle: { label: "Aug 29 – Sep 30", note: "5 sessions remaining.", totals: { hours: 10, present: 9, absent: 1, practice: 1 }, pattern: "pppppapp" }
    },
    scheduleActions: [
      { title: "Postpone upcoming session", detail: "Next lesson is Monday at 7 PM.", enabled: true },
      { title: "Change schedule", detail: "Current schedule: Monday evening.", enabled: true }
    ],
    classes: [{ name: "General English A2", meta: "Monday · 7:00 PM", status: "Active" }],
    learning: {
      canTakeExam: "Yes", certificateCount: 0,
      materials: [{ name: "A2 workbook", meta: "Units 8–10", url: "https://bostonenglish.example/materials/a2-workbook" }],
      certificates: [], tests: [{ name: "A2 unit review", score: 81 }]
    }
  },
  6: {
    summary: { values: ["IELTS Evening", "10", null] },
    profile: { level: "IELTS · Target 7.0", dashboardState: "Active" },
    subscriptions: [{ name: "IELTS Preparation", meta: "10 sessions remaining · renews Oct 20", status: "Active" }],
    alerts: [{ tone: "info", title: "Target score: 7.0", body: "Writing practice is the priority for the next learning review." }],
    attendance: {
      totals: { hours: 30, present: 27, absent: 3, practice: 8 }, pattern: "ppppappppapppppappp",
      cycle: { label: "Sep 10 – Oct 20", note: "10 sessions remaining.", totals: { hours: 6, present: 6, absent: 0, practice: 3 }, pattern: "pppppp" }
    },
    scheduleActions: [
      { title: "Postpone upcoming session", detail: "Next class is Wednesday at 8 PM.", enabled: true },
      { title: "Change schedule", detail: "Evening IELTS groups are available.", enabled: true }
    ],
    classes: [{ name: "IELTS Preparation", meta: "Wednesday & Friday · 8:00 PM", status: "Active" }],
    learning: {
      canTakeExam: "Yes", certificateCount: 0,
      materials: [
        { name: "IELTS writing task 2", meta: "Homework", url: "https://bostonenglish.example/materials/ielts-writing-2" },
        { name: "Band 7 speaking guide", meta: "Practice material", url: "https://bostonenglish.example/materials/ielts-speaking-7" }
      ],
      certificates: [], tests: [{ name: "IELTS diagnostic", score: 74 }, { name: "Writing mock test", score: 78 }]
    }
  },
  7: {
    summary: { values: ["4", "8", null] },
    profile: { level: "Tutor · C2", dashboardState: "Available" },
    subscriptions: [{ name: "Tutor engagement", meta: "4 active groups · afternoon availability", status: "Active" }],
    attendance: {
      totals: { hours: 52, present: 50, absent: 2, practice: 5 }, pattern: "ppppppppapppppppapp",
      cycle: { label: "September 2026", note: "8 upcoming sessions.", totals: { hours: 14, present: 14, absent: 0, practice: 2 }, pattern: "pppppppppppppp" }
    },
    scheduleActions: [
      { title: "Review upcoming session", detail: "Afternoon trial lesson is next.", enabled: true },
      { title: "Update availability", detail: "Available after 2 PM.", enabled: true }
    ],
    classes: [
      { name: "B2 Afternoon Group", meta: "Mon & Wed · 4:00 PM", status: "Active" },
      { name: "Trial lessons", meta: "Thursday · 5:00 PM", status: "Assigned" }
    ],
    learning: {
      canTakeExam: "Up to date", certificateCount: 3,
      materials: [{ name: "Tutor lesson plans · B2", meta: "Teaching material", url: "https://bostonenglish.example/tutors/b2-plans" }],
      certificates: [{ name: "CELTA", meta: "Verified", url: "https://bostonenglish.example/tutors/nadia/celta" }],
      tests: [{ name: "Annual teaching review", score: 96 }]
    }
  },
  8: {
    summary: { values: ["2", "6", null] },
    profile: { level: "Tutor · C2", dashboardState: "Active" },
    alerts: [{ tone: "warning", title: "Student level needed", body: "Confirm the assigned student’s level before preparing the next lesson." }],
    subscriptions: [{ name: "Tutor engagement", meta: "2 active groups · 18 teaching hours this cycle", status: "Active" }],
    attendance: {
      totals: { hours: 50, present: 46, absent: 4, practice: 2 }, pattern: "ppppapppppppappppp",
      cycle: { label: "September 2026", note: "6 upcoming sessions.", totals: { hours: 12, present: 11, absent: 1, practice: 1 }, pattern: "ppppappppppp" }
    },
    scheduleActions: [
      { title: "Review upcoming session", detail: "The student level is still pending.", enabled: true },
      { title: "Update availability", detail: "Next available slot is tomorrow at 6 PM.", enabled: true }
    ],
    classes: [
      { name: "B1 Evening Group", meta: "Tuesday & Thursday · 7:00 PM", status: "Active" },
      { name: "Assigned trial", meta: "Waiting for student level", status: "Needs details" }
    ],
    learning: {
      canTakeExam: "Up to date", certificateCount: 2,
      materials: [
        { name: "B1 placement checklist", meta: "Use before the trial", url: "https://bostonenglish.example/tutors/b1-checklist" },
        { name: "Tutor lesson planner", meta: "Teaching material", url: "https://bostonenglish.example/tutors/lesson-planner" }
      ],
      certificates: [{ name: "TESOL Certificate", meta: "Verified", url: "https://bostonenglish.example/tutors/rachid/tesol" }],
      tests: [{ name: "Annual teaching review", score: 92 }]
    }
  }
};

function mergeOverviewData(base, overlay) {
  if (overlay == null) return clone(base);
  if (Array.isArray(overlay)) return clone(overlay);
  if (typeof overlay !== "object") return overlay;
  const result = base && typeof base === "object" && !Array.isArray(base) ? clone(base) : {};
  Object.keys(overlay).forEach(function (key) {
    const value = overlay[key];
    if (value && typeof value === "object" && !Array.isArray(value)) result[key] = mergeOverviewData(result[key] || {}, value);
    else result[key] = clone(value);
  });
  return result;
}

function contactOverview(contact) {
  const category = overviewCategoryDefaults[contact.category] ? contact.category : "clients";
  let overview = mergeOverviewData(overviewCategoryDefaults[category], overviewContactProfiles[contact.id] || {});
  if (contact.overview && typeof contact.overview === "object") overview = mergeOverviewData(overview, contact.overview);
  const courseParts = String(contact.course || "").split("·").map(function (part) { return part.trim(); }).filter(Boolean);
  if ((!overview.profile.level || overview.profile.level === "Not assessed") && courseParts.length > 1) overview.profile.level = courseParts[courseParts.length - 1];
  if (contact.blocked) overview.profile.dashboardState = "Blocked";
  else if (contact.unanswered && category !== "tutors" && overview.profile.dashboardState === "Active") overview.profile.dashboardState = "Needs reply";
  return overview;
}

function attendancePercent(totals) {
  const present = Number(totals && totals.present) || 0;
  const absent = Number(totals && totals.absent) || 0;
  const counted = present + absent;
  return counted ? Math.round((present / counted) * 100) + "%" : "—";
}

function setDrawerText(id, value) {
  $(id).textContent = value == null || value === "" ? "—" : String(value);
}

function makeOverviewEmpty(message) {
  const empty = document.createElement("p");
  empty.className = "overview-empty";
  empty.textContent = message;
  return empty;
}

function makeOverviewCopyButton(value, label, accessibleLabel) {
  const button = document.createElement("button");
  button.type = "button";
  button.className = "copy-pill compact";
  button.dataset.copyValue = value || "";
  button.setAttribute("aria-label", accessibleLabel || label);
  button.append(makeIcon("i-copy"));
  const text = document.createElement("span");
  text.dataset.copyLabel = "";
  text.textContent = label;
  button.append(text);
  button.disabled = !value;
  return button;
}

function makeOverviewRow(item, options) {
  const row = document.createElement("div");
  row.className = "overview-list-row" + (options && options.tone ? " " + options.tone : "");
  const copy = document.createElement("div");
  copy.className = "overview-list-copy";
  const title = document.createElement("strong");
  title.textContent = item.name || item.title || "Untitled";
  copy.append(title);
  if (item.meta || item.detail) {
    const meta = document.createElement("span");
    meta.textContent = item.meta || item.detail;
    copy.append(meta);
  }
  row.append(copy);
  if (options && options.copyValue) row.append(makeOverviewCopyButton(options.copyValue, options.copyLabel || "Copy link", "Copy link for " + title.textContent));
  else if (item.status) {
    const status = document.createElement("span");
    status.className = "overview-status";
    status.textContent = item.status;
    row.append(status);
  }
  return row;
}

function renderOverviewAlerts(items) {
  const container = $("drawerAlerts");
  container.replaceChildren();
  container.hidden = !items.length;
  items.forEach(function (item) {
    const alert = document.createElement("div");
    alert.className = "overview-alert " + (item.tone || "info");
    alert.setAttribute("role", item.tone === "danger" ? "alert" : "status");
    const icon = document.createElement("span");
    icon.className = "overview-alert-icon";
    icon.append(makeIcon(item.tone === "warning" || item.tone === "danger" ? "i-warning" : "i-info"));
    const copy = document.createElement("div");
    const title = document.createElement("strong");
    title.textContent = item.title;
    const body = document.createElement("p");
    body.textContent = item.body;
    copy.append(title, body);
    alert.append(icon, copy);
    container.append(alert);
  });
}

function renderOverviewSubscriptions(items) {
  const container = $("drawerSubscriptions");
  container.replaceChildren();
  if (!items.length) {
    container.append(makeOverviewEmpty("No subscriptions or active engagement records."));
    return;
  }
  items.forEach(function (item) { container.append(makeOverviewRow(item)); });
}

function renderAttendanceHistory(containerId, pattern, labelPrefix) {
  const container = $(containerId);
  container.replaceChildren();
  const values = String(pattern || "").split("").filter(Boolean);
  if (!values.length) {
    container.append(makeOverviewEmpty("No attendance records yet."));
    return;
  }
  const statusByCode = { p: "present", a: "absent", r: "practice" };
  values.forEach(function (code, index) {
    const status = statusByCode[code] || "present";
    const date = new Date(2026, 7, 3 + index * 2, 18, 0);
    const dateLabel = new Intl.DateTimeFormat("en", { month: "short", day: "numeric", year: "numeric" }).format(date);
    const dot = document.createElement("span");
    dot.className = "attendance-dot " + status;
    dot.tabIndex = 0;
    dot.setAttribute("role", "img");
    const description = dateLabel + " · " + status.charAt(0).toUpperCase() + status.slice(1) + " · 1 hour";
    dot.setAttribute("aria-label", (labelPrefix ? labelPrefix + ": " : "") + description);
    dot.dataset.tooltip = description;
    container.append(dot);
  });
  const legend = document.createElement("div");
  legend.className = "attendance-legend";
  ["present", "absent", "practice"].forEach(function (status) {
    const item = document.createElement("span");
    const mark = document.createElement("i");
    mark.className = status;
    item.append(mark, document.createTextNode(status.charAt(0).toUpperCase() + status.slice(1)));
    legend.append(item);
  });
  container.append(legend);
}

function renderScheduleActions(items) {
  const container = $("drawerScheduleActions");
  container.replaceChildren();
  items.forEach(function (item) {
    const card = document.createElement("article");
    card.className = "schedule-action" + (item.enabled ? "" : " is-disabled");
    const icon = document.createElement("span");
    icon.className = "schedule-action-icon";
    icon.append(makeIcon("i-calendar"));
    const copy = document.createElement("div");
    const title = document.createElement("h4");
    title.textContent = item.title;
    const detail = document.createElement("p");
    detail.textContent = item.detail;
    copy.append(title, detail);
    const state = document.createElement("span");
    state.className = "schedule-action-state";
    state.textContent = item.enabled ? "Available" : "Unavailable";
    card.append(icon, copy, state);
    container.append(card);
  });
}

function renderClasses(items) {
  const container = $("drawerClasses");
  container.replaceChildren();
  if (!items.length) {
    container.append(makeOverviewEmpty("No classes assigned."));
    return;
  }
  items.forEach(function (item) { container.append(makeOverviewRow(item)); });
}

function renderLearningList(containerId, items, emptyMessage, type) {
  const container = $(containerId);
  container.replaceChildren();
  if (!items.length) {
    container.append(makeOverviewEmpty(emptyMessage));
    return;
  }
  items.forEach(function (item) {
    if (type === "test") {
      const row = makeOverviewRow(item);
      const score = document.createElement("span");
      score.className = "score-pill";
      score.textContent = Math.max(0, Math.min(100, Number(item.score) || 0)) + "%";
      row.append(score);
      container.append(row);
    } else {
      container.append(makeOverviewRow(item, item.url ? { copyValue: item.url, copyLabel: "Copy link" } : null));
    }
  });
}

function configureProfileCopyButton(id, value, label, contactName) {
  const button = $(id);
  button.dataset.copyValue = value || "";
  button.disabled = !value;
  button.setAttribute("aria-label", value ? label + " for " + contactName : label + " unavailable");
  button.querySelector("[data-copy-label]").textContent = value ? label : "Unavailable";
}

function renderDrawer() {
  const contact = activeContact();
  if (!contact) return;
  const overview = contactOverview(contact);
  const totals = overview.attendance.totals || {};
  const cycle = overview.attendance.cycle || {};
  const cycleTotals = cycle.totals || {};
  const summaryValues = (overview.summary.values || []).slice(0, 3);
  while (summaryValues.length < 3) summaryValues.push("—");
  if (contact.category !== "clients") summaryValues[2] = attendancePercent(totals);

  setAvatar($("drawerAvatar"), contact);
  $("drawerEyebrow").textContent = overview.eyebrow;
  $("drawerTitle").textContent = contact.name;
  $("drawerName").textContent = contact.name;
  $("drawerPresence").textContent = contactStatus(contact);
  $("drawerCourse").textContent = contact.course || "—";
  $("drawerLevel").textContent = overview.profile.level || "—";
  $("drawerDashboardState").textContent = overview.profile.dashboardState || "Active";
  $("drawerDashboardState").className = "state-pill" + (contact.blocked ? " blocked" : contact.unanswered ? " attention" : "");
  configureProfileCopyButton("drawerPhone", contact.phone, "Copy phone", contact.name);
  configureProfileCopyButton("drawerEmail", contact.email, "Copy email", contact.name);

  try {
    $("drawerTime").textContent = new Intl.DateTimeFormat("en", { timeZone: contact.timezone || "Africa/Casablanca", hour: "2-digit", minute: "2-digit", timeZoneName: "short" }).format(new Date());
  } catch (error) {
    $("drawerTime").textContent = "Local time unavailable";
  }

  (overview.summary.labels || []).slice(0, 3).forEach(function (label, index) {
    setDrawerText(["drawerSummaryLabelOne", "drawerSummaryLabelTwo", "drawerSummaryLabelThree"][index], label);
  });
  summaryValues.forEach(function (value, index) {
    setDrawerText(["drawerSummaryOne", "drawerSummaryTwo", "drawerSummaryThree"][index], value);
  });

  $("subscriptionSectionTitle").textContent = overview.sectionLabels.subscription;
  $("attendanceSectionTitle").textContent = overview.sectionLabels.attendance;
  $("learningSectionTitle").textContent = overview.sectionLabels.learning;
  $("contactNotes").value = contact.notes || "";
  $("drawerMessageCount").textContent = contact.messages.length;
  $("drawerChannel").textContent = lastMessage(contact) ? lastMessage(contact).channel.replace("WhatsApp Student Support", "Student support") : "—";
  $("drawerResolveBtn").textContent = contact.unanswered ? "Resolve" : "Reopen";
  $("drawerResolveBtn").prepend(makeIcon("i-check"));

  const tags = $("drawerTags");
  tags.replaceChildren();
  (contact.tags || []).forEach(function (tagText) {
    const tag = document.createElement("span");
    tag.className = "tag";
    tag.textContent = tagText;
    tags.append(tag);
  });

  renderOverviewAlerts(overview.alerts || []);
  renderOverviewSubscriptions(overview.subscriptions || []);

  setDrawerText("drawerHours", totals.hours || 0);
  setDrawerText("drawerPresent", totals.present || 0);
  setDrawerText("drawerAbsent", totals.absent || 0);
  setDrawerText("drawerPractice", totals.practice || 0);
  renderAttendanceHistory("drawerAttendanceDots", overview.attendance.pattern, "Attendance");

  setDrawerText("drawerCycleLabel", cycle.label || "Current cycle");
  setDrawerText("drawerCycleHours", cycleTotals.hours || 0);
  setDrawerText("drawerCyclePresent", cycleTotals.present || 0);
  setDrawerText("drawerCycleAbsent", cycleTotals.absent || 0);
  setDrawerText("drawerCyclePractice", cycleTotals.practice || 0);
  renderAttendanceHistory("drawerCycleDots", cycle.pattern, "Current cycle");
  $("drawerCycleDots").setAttribute("data-cycle-note", cycle.note || "");

  renderScheduleActions(overview.scheduleActions || []);
  renderClasses(overview.classes || []);

  setDrawerText("drawerExamEligibility", overview.learning.canTakeExam || "—");
  setDrawerText("drawerCertificateCount", overview.learning.certificateCount == null ? (overview.learning.certificates || []).length : overview.learning.certificateCount);
  renderLearningList("drawerMaterials", overview.learning.materials || [], "No course materials assigned.", "material");
  renderLearningList("drawerCertificates", overview.learning.certificates || [], "No certificates yet.", "certificate");
  renderLearningList("drawerTests", overview.learning.tests || [], "No tests taken yet.", "test");
}
function selectContact(id, navigate) {
  if (sendInProgress) { showToast("Finishing message", "Wait a moment while the audio is saved."); return; }
  if (voiceSession) cancelVoiceRecording(true);
  clearMessageSelection(false);
  closeMessageActionMenu(false);
  releasePendingAttachment();
  const previous = activeContact();
  if (previous && $("messageInput") && !previous.blocked) state.drafts[previous.id] = $("messageInput").value;
  const next = state.contacts.find(function (contact) { return contact.id === id; });
  if (!next) return;
  state.activeId = next.id;
  next.unread = 0;
  replyTo = null;
  $("messageSearchInput").value = "";
  $("conversationSearch").hidden = true;
  closePanels();
  renderContacts();
  renderHeader();
  $("messageInput").value = state.drafts[next.id] || "";
  autoResizeComposer();
  renderAttachmentPreview();
  renderReplyPreview();
  renderMessages(true);
  safeSave();
  if (navigate) {
    $("appShell").classList.add("conversation-open");
    if (window.matchMedia("(max-width: 759px)").matches) {
      requestAnimationFrame(function () { $("mobileBack").focus(); });
    }
  }
}

function renderReplyPreview() {
  $("replyPreview").hidden = !replyTo;
  $("replyText").textContent = replyTo ? (replyTo.body || (replyTo.attachment && attachmentPreviewLabel(replyTo.attachment)) || "Attachment") : "";
}

function setReply(message) {
  replyTo = message;
  renderReplyPreview();
  $("messageInput").focus();
}

function renderAttachmentPreview() {
  const preview = $("attachmentPreview");
  const audioPreview = $("attachmentAudioPreview");
  preview.hidden = !pendingAttachment;
  preview.classList.toggle("is-audio", isAudioAttachment(pendingAttachment));
  if (!pendingAttachment) {
    audioPreview.pause();
    audioPreview.removeAttribute("src");
    audioPreview.hidden = true;
    updateComposer();
    return;
  }
  const isAudio = isAudioAttachment(pendingAttachment);
  $("attachmentName").textContent = pendingAttachment.name;
  $("attachmentMeta").textContent = (isAudio && pendingAttachment.duration ? formatDuration(pendingAttachment.duration) + " - " : "") + fileSize(pendingAttachment.size) + " - " + (pendingAttachment.type || "File");
  const icon = $("attachmentPreviewIcon");
  icon.replaceChildren(makeIcon(isAudio ? "i-audio" : pendingAttachment.type.indexOf("image/") === 0 ? "i-image" : "i-file"));
  audioPreview.hidden = !isAudio;
  if (isAudio && pendingAttachment.url) {
    if (audioPreview.src !== pendingAttachment.url) audioPreview.src = pendingAttachment.url;
    audioPreview.setAttribute("aria-label", "Preview " + pendingAttachment.name);
  } else {
    audioPreview.pause();
    audioPreview.removeAttribute("src");
  }
  updateComposer();
}

function updateComposer() {
  const contact = activeContact();
  const value = $("messageInput").value;
  const hasContent = Boolean(value.trim() || pendingAttachment);
  const canSend = Boolean(contact && !contact.blocked && hasContent && !sendInProgress);
  const voiceAllowed = Boolean(contact && !contact.blocked && selectedChannelAllowsVoice());
  $("sendMessage").disabled = !canSend;
  $("recordAudioBtn").disabled = !voiceAllowed || Boolean(voiceSession) || sendInProgress;
  $("recordAudioBtn").setAttribute("aria-label", voiceAllowed ? "Record a voice message" : "Voice messages require a WhatsApp channel");
  $("message-form").classList.toggle("has-sendable-content", hasContent);
  $("message-form").classList.toggle("audio-disabled", !voiceAllowed);
  $("messageInput").readOnly = sendInProgress;
  $("removeAttachmentBtn").disabled = sendInProgress;
  $("attachmentBtn").disabled = Boolean(contact && contact.blocked) || sendInProgress;
  $("btnEmoji").disabled = Boolean(contact && contact.blocked) || sendInProgress;
  $("quickRepliesBtn").disabled = Boolean(contact && contact.blocked) || sendInProgress;
  $("sendGreetingBtn").disabled = Boolean(contact && contact.blocked) || sendInProgress;
  $("typeInput").disabled = sendInProgress;
  $("composerSpeedDialBtn").disabled = Boolean(contact && contact.blocked) || sendInProgress;
  $("mobileBack").disabled = sendInProgress;
  $("leftSideSection").inert = sendInProgress;
  $("draftCount").textContent = value.length + " / 2000";
  if (contact) {
    if (value) state.drafts[contact.id] = value;
    else delete state.drafts[contact.id];
  }
}

function autoResizeComposer() {
  const input = $("messageInput");
  input.style.height = "auto";
  input.style.height = Math.min(input.scrollHeight, 132) + "px";
  updateComposer();
}

function insertAtCaret(text) {
  const input = $("messageInput");
  const start = input.selectionStart == null ? input.value.length : input.selectionStart;
  const end = input.selectionEnd == null ? input.value.length : input.selectionEnd;
  input.setRangeText(text, start, end, "end");
  autoResizeComposer();
  input.focus();
}

function syncChannelPicker() {
  const trigger = $("typeInput");
  const definition = channelDefinitions[trigger.value] || channelDefinitions.WhatsApp;
  if (!channelDefinitions[trigger.value]) trigger.value = "WhatsApp";
  trigger.dataset.channel = definition.key;
  trigger.setAttribute("aria-label", "Message channel: " + trigger.value);

  $("channelTriggerValue").textContent = trigger.value;
  $("channelTriggerIconUse").setAttribute("href", "#" + definition.icon);
  document.querySelectorAll("#channelMenu [data-channel-value]").forEach(function (option) {
    option.setAttribute("aria-checked", String(option.dataset.channelValue === trigger.value));
  });
}

function selectMessageChannel(value) {
  if (!channelDefinitions[value]) return;
  const trigger = $("typeInput");
  const changed = trigger.value !== value;
  trigger.value = value;
  syncChannelPicker();
  if (changed) trigger.dispatchEvent(new Event("change", { bubbles: true }));
  else updateComposer();
  closePanels();
  requestAnimationFrame(function () { $("composerSpeedDialBtn").focus(); });
}

function closePanels(except) {
  if (except !== "messageActionMenu") closeMessageActionMenu(false);
  ["conversationMenu", "attachmentMenu", "composerSpeedDial", "channelMenu", "emojiPanel", "templatePanel", "statusFilterMenu"].forEach(function (id) {
    if (id === except) return;
    $(id).hidden = true;
  });
  $("conversationMenuBtn").setAttribute("aria-expanded", String(except === "conversationMenu"));
  $("attachmentBtn").setAttribute("aria-expanded", String(except === "attachmentMenu"));
  $("composerSpeedDialBtn").setAttribute("aria-expanded", String(except === "composerSpeedDial"));
  $("composerSpeedDialBtn").setAttribute("aria-label", except === "composerSpeedDial" ? "Close message tools" : "Open message tools");
  $("typeInput").setAttribute("aria-expanded", String(except === "channelMenu"));
  $("btnEmoji").setAttribute("aria-expanded", String(except === "emojiPanel"));
  $("quickRepliesBtn").setAttribute("aria-expanded", String(except === "templatePanel"));
  $("statusFilterBtn").setAttribute("aria-expanded", String(except === "statusFilterMenu"));
}

function togglePanel(id, trigger) {
  const panel = $(id);
  const willOpen = panel.hidden;
  closePanels(willOpen ? id : null);
  panel.hidden = !willOpen;
  trigger.setAttribute("aria-expanded", String(willOpen));
  if (willOpen) {
    const first = id === "emojiPanel"
      ? $("emojiSearchInput")
      : (id === "statusFilterMenu" || id === "channelMenu")
        ? panel.querySelector("[aria-checked='true']")
        : Array.from(panel.querySelectorAll("button:not(:disabled), input:not(:disabled)")).find(function (control) {
          return !control.hidden && control.getClientRects().length;
        });
    if (first) requestAnimationFrame(function () { first.focus(); });
  }
}

function setDrawerBackgroundInert(value) {
  const elements = [document.querySelector(".utility-rail"), $("leftSideSection"), $("rightSideSection")].filter(Boolean);
  if (value) {
    if (!drawerInertRestore) drawerInertRestore = elements.map(function (element) { return element.inert; });
    elements.forEach(function (element) { element.inert = true; });
  } else {
    elements.forEach(function (element, index) {
      const wasInert = drawerInertRestore ? drawerInertRestore[index] : false;
      element.inert = Boolean(wasInert || (element.id === "leftSideSection" && sendInProgress));
    });
    drawerInertRestore = null;
  }
  $("contactDrawer").setAttribute("aria-modal", String(value));
}

function openDrawer(trigger) {
  if (!activeContact()) return;
  closePanels();
  lastDrawerTrigger = trigger || document.activeElement;
  renderDrawer();
  $("contactDrawer").inert = false;
  $("appShell").classList.add("details-open");
  $("contactDrawer").setAttribute("aria-hidden", "false");
  $("drawerBackdrop").hidden = false;
  setDrawerBackgroundInert(true);
  requestAnimationFrame(function () { $("closeOverview").focus(); });
}

function closeDrawer() {
  if (!$("appShell").classList.contains("details-open")) return;
  $("appShell").classList.remove("details-open");
  $("contactDrawer").setAttribute("aria-hidden", "true");
  $("contactDrawer").inert = true;
  $("drawerBackdrop").hidden = true;
  setDrawerBackgroundInert(false);
  const focusTarget = lastDrawerTrigger && document.contains(lastDrawerTrigger) && !lastDrawerTrigger.disabled ? lastDrawerTrigger : $("activeContactButton");
  if (focusTarget) focusTarget.focus();
}

function fallbackCopyText(value) {
  const textarea = document.createElement("textarea");
  textarea.value = value;
  textarea.setAttribute("readonly", "");
  textarea.style.position = "fixed";
  textarea.style.opacity = "0";
  textarea.style.pointerEvents = "none";
  document.body.append(textarea);
  textarea.select();
  const copied = document.execCommand("copy");
  textarea.remove();
  if (!copied) throw new Error("Copy command was rejected.");
}

async function copyOverviewValue(button) {
  const value = button.dataset.copyValue;
  if (!value) return;
  const label = button.querySelector("[data-copy-label]");
  const original = label ? label.textContent : "Copy";
  try {
    if (navigator.clipboard && window.isSecureContext) await navigator.clipboard.writeText(value);
    else fallbackCopyText(value);
    if (label) label.textContent = "Copied";
    button.classList.add("is-copied");
    showToast("Copied", "The value is ready to paste.");
    window.setTimeout(function () {
      if (label && document.contains(label)) label.textContent = original;
      button.classList.remove("is-copied");
    }, 1600);
  } catch (error) {
    showToast("Could not copy", "Select and copy the value manually.", "error");
  }
}
function showToast(title, message, type, action) {
  const toast = document.createElement("div");
  toast.className = "toast" + (type === "error" ? " error" : "");
  toast.setAttribute("role", type === "error" ? "alert" : "status");
  const mark = document.createElement("span");
  mark.className = "toast-mark";
  mark.textContent = type === "error" ? "!" : "✓";
  const copy = document.createElement("div");
  copy.className = "toast-copy";
  const heading = document.createElement("strong");
  heading.textContent = title;
  const body = document.createElement("span");
  body.textContent = message;
  copy.append(heading, body);
  toast.append(mark, copy);
  if (action && action.label && action.callback) {
    const button = document.createElement("button");
    button.type = "button";
    button.textContent = action.label;
    button.addEventListener("click", function () {
      action.callback();
      toast.remove();
    });
    toast.append(button);
  }
  $("toastStack").append(toast);
  window.setTimeout(function () { if (toast.isConnected) toast.remove(); }, 4800);
}

function askConfirmation(options) {
  $("confirmTitle").textContent = options.title;
  $("confirmDescription").textContent = options.description;
  $("confirmAccept").textContent = options.accept || "Confirm";
  $("confirmAccept").className = options.danger === false ? "button-primary" : "button-danger";
  $("confirmDialog").showModal();
  requestAnimationFrame(function () { $("confirmCancel").focus(); });
  return new Promise(function (resolve) { confirmResolver = resolve; });
}

function resolveConfirmation(value) {
  if (confirmResolver) {
    const resolve = confirmResolver;
    confirmResolver = null;
    resolve(value);
  }
  if ($("confirmDialog").open) $("confirmDialog").close();
}

async function toggleBlocked() {
  const contact = activeContact();
  if (!contact) return;
  if (!contact.blocked) {
    const confirmed = await askConfirmation({
      title: "Block " + contact.name + "?",
      description: "You will not be able to send messages to this contact until you unblock them.",
      accept: "Block contact"
    });
    if (!confirmed) return;
    contact.blocked = true;
    if (voiceSession) cancelVoiceRecording(false);
    releasePendingAttachment();
    renderAttachmentPreview();
    showToast("Contact blocked", contact.name + " can be unblocked from this conversation.");
  } else {
    contact.blocked = false;
    showToast("Contact unblocked", "You can send messages to " + contact.name + " again.");
  }
  renderHeader();
  renderContacts();
  safeSave();
  closePanels();
}

function toggleResolved() {
  const contact = activeContact();
  if (!contact) return;
  const wasOpen = contact.unanswered;
  contact.unanswered = !contact.unanswered;
  renderHeader();
  renderContacts();
  safeSave();
  if (wasOpen) {
    showToast("Conversation resolved", contact.name + " was removed from Needs reply.", "success", {
      label: "Undo",
      callback: function () {
        contact.unanswered = true;
        renderHeader();
        renderContacts();
        safeSave();
      }
    });
  } else {
    showToast("Conversation reopened", contact.name + " now needs a reply.");
  }
}

function renderTemplates(query) {
  const value = (query || "").trim().toLowerCase();
  const list = $("templateList");
  list.replaceChildren();
  quickReplies.filter(function (item) {
    return !value || (item.title + " " + item.body).toLowerCase().indexOf(value) >= 0;
  }).forEach(function (item) {
    const button = document.createElement("button");
    button.type = "button";
    button.className = "template-item";
    const title = document.createElement("strong");
    title.textContent = item.title;
    const body = document.createElement("span");
    body.textContent = item.body;
    button.append(title, body);
    button.addEventListener("click", function () {
      insertAtCaret(item.body);
      closePanels();
      showToast("Quick reply added", "Edit the message before sending.");
    });
    list.append(button);
  });
  if (!list.children.length) {
    const empty = document.createElement("div");
    empty.className = "empty-state compact";
    const title = document.createElement("h2");
    title.textContent = "No quick replies";
    const body = document.createElement("p");
    body.textContent = "Try a different search.";
    empty.append(title, body);
    list.append(empty);
  }
}


function normalizeEmojiSearch(value) {
  return String(value || "").normalize("NFD").replace(/[\u0300-\u036f]/g, "").trim().toLowerCase();
}

function stripEmojiTone(glyph) {
  return String(glyph || "").replace(/[\u{1F3FB}-\u{1F3FF}]/gu, "").replace(/\uFE0F/g, "");
}

function emojiWithSelectedTone(entry) {
  const toneIndex = Math.max(0, Math.min(5, Number(state.emojiTone) || 0));
  const tone = emojiTones[toneIndex].value;
  if (!tone) return entry.glyph;
  const explicitVariant = entry.toneVariants && entry.toneVariants[String(toneIndex)];
  if (explicitVariant) return explicitVariant;
  if (!entry.toneable) return entry.glyph;
  return entry.glyph.replace(/\p{Emoji_Modifier_Base}\uFE0F?/u, function (match) {
    const hasVariation = match.endsWith("\uFE0F");
    const base = hasVariation ? match.slice(0, -1) : match;
    return base + tone + (hasVariation ? "\uFE0F" : "");
  });
}

function emojiToneLabel() {
  return emojiTones[Math.max(0, Math.min(5, Number(state.emojiTone) || 0))].label;
}

function emojiToneDescriptionFromGlyph(glyph) {
  const indexes = Array.from(glyph || "").map(function (character) {
    const point = character.codePointAt(0);
    return point >= 0x1f3fb && point <= 0x1f3ff ? point - 0x1f3fa : 0;
  }).filter(Boolean);
  if (!indexes.length) return "";
  const unique = Array.from(new Set(indexes));
  if (unique.length === 1) return emojiTones[unique[0]].label;
  return unique.map(function (index) { return emojiTones[index].label.replace(/ skin tone$/i, ""); }).join(" and ") + " skin tones";
}

function recentEmojiEntries() {
  const recents = Array.isArray(state.emojiRecents) ? state.emojiRecents : [];
  return recents.map(function (glyph) {
    const base = stripEmojiTone(glyph);
    const exact = emojiCatalog.find(function (item) { return item.glyph === glyph; });
    const entry = exact || emojiCatalog.find(function (item) { return stripEmojiTone(item.glyph) === base && !item.mixedTone; });
    if (!entry) return null;
    const toneDescription = exact ? "" : emojiToneDescriptionFromGlyph(glyph);
    return Object.assign({}, entry, { recentGlyph: glyph, recentName: entry.name + (toneDescription ? ", " + toneDescription : "") });
  }).filter(Boolean);
}

function visibleEmojiEntries() {
  const query = normalizeEmojiSearch($("emojiSearchInput").value);
  if (query) {
    const tokens = query.split(/\s+/).filter(Boolean);
    return emojiCatalog.filter(function (entry) {
      const haystack = normalizeEmojiSearch(entry.name + " " + entry.search);
      return tokens.every(function (token) { return haystack.indexOf(token) >= 0; });
    });
  }
  if (activeEmojiCategory === "recent") return recentEmojiEntries();
  return emojiCatalog.filter(function (entry) { return entry.category === activeEmojiCategory; });
}

function renderEmojiTonePicker() {
  const picker = $("emojiTonePicker");
  const label = picker.querySelector(":scope > span");
  picker.replaceChildren();
  picker.append(label || document.createElement("span"));
  picker.firstElementChild.textContent = "Skin tone";
  emojiTones.forEach(function (tone, index) {
    const button = document.createElement("button");
    button.type = "button";
    button.textContent = tone.glyph;
    button.dataset.toneIndex = String(index);
    button.setAttribute("aria-label", tone.label);
    button.setAttribute("aria-pressed", String(Number(state.emojiTone) === index));
    button.title = tone.label;
    picker.append(button);
  });
}

function renderEmojiCategories() {
  const navigation = $("emojiCategories");
  navigation.replaceChildren();
  emojiCategoryDefinitions.forEach(function (category) {
    const button = document.createElement("button");
    button.type = "button";
    button.id = "emoji-category-" + category.id;
    button.dataset.emojiCategory = category.id;
    button.setAttribute("role", "tab");
    button.setAttribute("aria-controls", "emojiGrid");
    button.setAttribute("aria-label", category.label);
    button.setAttribute("aria-selected", String(category.id === activeEmojiCategory));
    button.tabIndex = category.id === activeEmojiCategory ? 0 : -1;
    button.title = category.label;
    button.textContent = category.icon;
    navigation.append(button);
  });
}

function renderEmojiGrid(focusIndex) {
  const grid = $("emojiGrid");
  const entries = visibleEmojiEntries();
  const query = normalizeEmojiSearch($("emojiSearchInput").value);
  grid.replaceChildren();
  $("clearEmojiSearch").hidden = !query;
  $("emojiEmpty").hidden = entries.length > 0;
  grid.hidden = entries.length === 0;
  const category = emojiCategoryDefinitions.find(function (item) { return item.id === activeEmojiCategory; });
  $("emojiCategoryLabel").textContent = query ? "Search results" : (category ? category.label : "Emoji");
  $("emojiResultCount").textContent = entries.length + (entries.length === 1 ? " emoji" : " emojis");
  document.querySelectorAll("[data-emoji-category]").forEach(function (button) {
    const selected = button.dataset.emojiCategory === activeEmojiCategory;
    button.setAttribute("aria-selected", String(selected));
    button.tabIndex = selected ? 0 : -1;
  });
  const fragment = document.createDocumentFragment();
  entries.forEach(function (entry, index) {
    const glyph = entry.recentGlyph || emojiWithSelectedTone(entry);
    const button = document.createElement("button");
    button.type = "button";
    button.dataset.emojiId = entry.id;
    button.dataset.emojiGlyph = glyph;
    const toneNote = entry.toneable && Number(state.emojiTone) > 0 && !entry.recentGlyph ? ", " + emojiToneLabel().toLowerCase() : "";
    const accessibleName = (entry.recentName || entry.name) + toneNote;
    button.setAttribute("aria-label", accessibleName);
    button.title = accessibleName;
    button.tabIndex = index === (Number.isInteger(focusIndex) ? focusIndex : 0) ? 0 : -1;
    button.textContent = glyph;
    fragment.append(button);
  });
  grid.append(fragment);
  if (Number.isInteger(focusIndex)) {
    const buttons = Array.from(grid.querySelectorAll("button"));
    const target = buttons[Math.max(0, Math.min(buttons.length - 1, focusIndex))];
    if (target) target.focus();
  }
}

function rememberEmoji(glyph) {
  const recents = Array.isArray(state.emojiRecents) ? state.emojiRecents : [];
  state.emojiRecents = [glyph].concat(recents.filter(function (item) { return item !== glyph; })).slice(0, 32);
  safeSave();
}

function insertEmojiGlyph(glyph) {
  const input = $("messageInput");
  const start = Math.max(0, Math.min(input.value.length, emojiCaret.start));
  const end = Math.max(start, Math.min(input.value.length, emojiCaret.end));
  const nextLength = input.value.length - (end - start) + glyph.length;
  if (nextLength > Number(input.maxLength || 2000)) {
    showToast("Message is full", "Remove some text before adding another emoji.", "error");
    return false;
  }
  input.setRangeText(glyph, start, end, "end");
  emojiCaret = { start: input.selectionStart, end: input.selectionEnd };
  autoResizeComposer();
  rememberEmoji(glyph);
  return true;
}

function openEmojiPicker() {
  if ($("btnEmoji").disabled) return;
  const input = $("messageInput");
  emojiCaret = { start: input.selectionStart == null ? input.value.length : input.selectionStart, end: input.selectionEnd == null ? input.value.length : input.selectionEnd };
  const opening = $("emojiPanel").hidden;
  if (opening) {
    renderEmojiTonePicker();
    renderEmojiCategories();
    renderEmojiGrid();
  }
  togglePanel("emojiPanel", $("btnEmoji"));
  if (opening) requestAnimationFrame(function () { $("emojiSearchInput").focus(); });
}

function closeEmojiPicker(restoreFocus) {
  const wasOpen = !$("emojiPanel").hidden;
  closePanels();
  if (wasOpen && restoreFocus) requestAnimationFrame(function () { $("btnEmoji").focus(); });
}

function moveEmojiGridFocus(event) {
  const buttons = Array.from($("emojiGrid").querySelectorAll("button"));
  const index = buttons.indexOf(event.target);
  if (index < 0) return;
  const columns = Math.max(1, getComputedStyle($("emojiGrid")).gridTemplateColumns.split(" ").length);
  let next = index;
  if (event.key === "ArrowRight") next = Math.min(buttons.length - 1, index + 1);
  if (event.key === "ArrowLeft") next = Math.max(0, index - 1);
  if (event.key === "ArrowDown") next = Math.min(buttons.length - 1, index + columns);
  if (event.key === "ArrowUp") next = Math.max(0, index - columns);
  if (event.key === "Home") next = 0;
  if (event.key === "End") next = buttons.length - 1;
  if (next === index && !["Home", "End"].includes(event.key)) return;
  event.preventDefault();
  buttons.forEach(function (button, buttonIndex) { button.tabIndex = buttonIndex === next ? 0 : -1; });
  buttons[next].focus();
}


const MAX_VOICE_SECONDS = 120;
let voiceRequestToken = 0;
let voiceSession = null;
let sendInProgress = false;

function selectedChannelAllowsVoice() {
  return $("typeInput").value.toLowerCase().indexOf("whatsapp") === 0;
}
function stopMediaStream(stream) {
  if (stream) stream.getTracks().forEach(function (track) { track.stop(); });
}
function voiceElapsedSeconds(session) {
  if (!session || !session.startedAt) return 0;
  const endpoint = session.pausedAt || performance.now();
  return Math.max(0, (endpoint - session.startedAt - session.totalPausedMs) / 1000);
}
function stopVoiceVisualizer(session) {
  if (!session) return;
  if (session.visualizerFrame) {
    window.cancelAnimationFrame(session.visualizerFrame);
    session.visualizerFrame = null;
  }
  if (session.visualizerSource) {
    try { session.visualizerSource.disconnect(); } catch (error) { console.warn("Could not disconnect voice visualizer.", error); }
    session.visualizerSource = null;
  }
  if (session.audioContext && session.audioContext.state !== "closed") {
    session.audioContext.close().catch(function () {});
  }
  session.audioContext = null;
  session.analyser = null;
  const panel = $("voiceRecorder");
  panel.classList.remove("has-live-levels");
  panel.style.removeProperty("--recording-glow");
  panel.querySelectorAll(".voice-waveform span").forEach(function (bar) { bar.style.removeProperty("--level"); });
}
function startVoiceVisualizer(session) {
  const AudioContextClass = window.AudioContext || window.webkitAudioContext;
  const panel = $("voiceRecorder");
  const bars = Array.from(panel.querySelectorAll(".voice-waveform span"));
  if (!AudioContextClass || !session || !session.stream || !bars.length || window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
  try {
    const context = new AudioContextClass();
    const source = context.createMediaStreamSource(session.stream);
    const analyser = context.createAnalyser();
    analyser.fftSize = 64;
    analyser.smoothingTimeConstant = .76;
    source.connect(analyser);
    session.audioContext = context;
    session.visualizerSource = source;
    session.analyser = analyser;
    const levels = new Uint8Array(analyser.frequencyBinCount);
    panel.classList.add("has-live-levels");
    context.resume().catch(function () {});

    function drawVoiceLevels(timestamp) {
      if (voiceSession !== session || session.discard || session.finalized) return;
      let energy = 0;
      if (session.phase === "recording") {
        analyser.getByteFrequencyData(levels);
        bars.forEach(function (bar, index) {
          const sample = levels[Math.min(levels.length - 1, Math.floor(index / bars.length * levels.length))] / 255;
          const ambient = .24 + Math.abs(Math.sin(timestamp / 210 + index * .76)) * .3;
          const level = Math.min(1.18, Math.max(.18, sample * 1.2 + ambient * (sample < .08 ? .72 : .32)));
          energy += level;
          bar.style.setProperty("--level", level.toFixed(2));
        });
      } else {
        bars.forEach(function (bar, index) {
          const level = session.phase === "paused" ? .16 : .22 + (index % 3) * .04;
          energy += level;
          bar.style.setProperty("--level", level.toFixed(2));
        });
      }
      panel.style.setProperty("--recording-glow", (2 + energy / bars.length * 5).toFixed(2) + "px");
      session.visualizerFrame = window.requestAnimationFrame(drawVoiceLevels);
    }
    session.visualizerFrame = window.requestAnimationFrame(drawVoiceLevels);
  } catch (error) {
    stopVoiceVisualizer(session);
  }
}
function clearVoiceTimers(session) {
  if (!session) return;
  window.clearInterval(session.clockTimer);
  window.clearTimeout(session.maxTimer);
  session.clockTimer = null;
  session.maxTimer = null;
  stopVoiceVisualizer(session);
}
function scheduleVoiceLimit(session) {
  if (!session) return;
  window.clearTimeout(session.maxTimer);
  const remainingSeconds = Math.max(0, MAX_VOICE_SECONDS - voiceElapsedSeconds(session));
  session.maxTimer = window.setTimeout(function () {
    if (voiceSession === session) {
      showToast("Recording limit reached", "The two-minute voice note is sending now.");
      finishVoiceRecording();
    }
  }, remainingSeconds * 1000);
}
function announceVoice(text) {
  $("voiceRecorderAnnouncement").textContent = "";
  window.setTimeout(function () { $("voiceRecorderAnnouncement").textContent = text; }, 20);
}
function renderVoiceRecorder() {
  const session = voiceSession;
  const panel = $("voiceRecorder");
  const shell = $("formSendMessage");
  if (!session) {
    panel.hidden = true;
    panel.dataset.phase = "idle";
    panel.classList.remove("is-paused", "is-requesting", "is-stopping", "has-live-levels");
    panel.style.removeProperty("--recording-glow");
    shell.classList.remove("is-recording");
    $("recordAudioBtn").setAttribute("aria-pressed", "false");
    $("recordAudioBtn").classList.remove("is-requesting");
    return;
  }
  panel.hidden = false;
  panel.dataset.phase = session.phase;
  shell.classList.add("is-recording");
  panel.classList.toggle("is-paused", session.phase === "paused");
  panel.classList.toggle("is-requesting", session.phase === "requesting");
  panel.classList.toggle("is-stopping", session.phase === "stopping");
  $("recordAudioBtn").setAttribute("aria-pressed", "true");
  $("recordAudioBtn").classList.toggle("is-requesting", session.phase === "requesting");
  const requesting = session.phase === "requesting";
  const stopping = session.phase === "stopping";
  panel.setAttribute("aria-label", requesting ? "Connecting to microphone" : session.phase === "paused" ? "Voice recording paused" : stopping ? "Sending voice message" : "Voice recording in progress");
  $("voiceRecorderTime").textContent = formatDuration(voiceElapsedSeconds(session));
  $("voiceRecorderTime").dateTime = "PT" + Math.round(voiceElapsedSeconds(session)) + "S";
  $("pauseVoiceBtn").disabled = requesting || stopping;
  $("stopVoiceBtn").disabled = requesting || stopping;
  $("pauseVoiceBtn").setAttribute("aria-pressed", String(session.phase === "paused"));
  $("pauseVoiceBtn").setAttribute("aria-label", session.phase === "paused" ? "Resume voice recording" : "Pause voice recording");
  $("pauseVoiceBtn").replaceChildren(makeIcon(session.phase === "paused" ? "i-play" : "i-pause"));
}
function resetVoiceSession(session) {
  clearVoiceTimers(session);
  stopMediaStream(session && session.stream);
  if (voiceSession === session) voiceSession = null;
  renderVoiceRecorder();
  updateComposer();
}
function audioFallbackAction() {
  return { label: "Choose audio", callback: function () { attachmentMode = "audio"; $("fileInput").accept = "audio/*"; $("fileInput").click(); } };
}
function voiceErrorCopy(error) {
  const name = error && error.name;
  if (name === "NotAllowedError" || name === "SecurityError") return { title: "Microphone permission denied", body: "Allow microphone access, or choose an audio file instead." };
  if (name === "NotFoundError") return { title: "No microphone found", body: "Connect a microphone, or choose an audio file instead." };
  if (name === "NotReadableError" || name === "AbortError") return { title: "Microphone is busy", body: "Close other apps using it, then try again." };
  return { title: "Could not start recording", body: "Try again, or choose an audio file instead." };
}
function failVoiceSession(session, error) {
  if (session && session.failed) return;
  if (session) session.failed = true;
  voiceRequestToken += 1;
  resetVoiceSession(session);
  const copy = voiceErrorCopy(error);
  showToast(copy.title, copy.body, "error", audioFallbackAction());
  requestAnimationFrame(function () { if (!$("recordAudioBtn").disabled) $("recordAudioBtn").focus(); });
}
async function startVoiceRecording() {
  const contact = activeContact();
  if (!contact || contact.blocked || voiceSession || sendInProgress) return;
  if (!selectedChannelAllowsVoice()) {
    showToast("Voice notes use WhatsApp", "Choose a WhatsApp channel before recording.", "error");
    return;
  }
  if ($("messageInput").value.trim() || pendingAttachment) {
    showToast("Finish this message first", "Send or clear the current text and attachment before recording.", "error");
    return;
  }
  if (!window.isSecureContext || !navigator.mediaDevices || !navigator.mediaDevices.getUserMedia || !window.MediaRecorder) {
    showToast("Microphone recording is unavailable", "Open the preview on localhost or choose an audio file instead.", "error", audioFallbackAction());
    return;
  }
  closePanels();
  const session = { token: ++voiceRequestToken, phase: "requesting", contactId: contact.id, stream: null, recorder: null, chunks: [], startedAt: 0, pausedAt: 0, totalPausedMs: 0, clockTimer: null, maxTimer: null, discard: false, failed: false };
  voiceSession = session;
  renderVoiceRecorder();
  requestAnimationFrame(function () { if (voiceSession === session) $("cancelVoiceBtn").focus(); });
  announceVoice("Requesting microphone access.");
  try {
    const stream = await navigator.mediaDevices.getUserMedia({ audio: { echoCancellation: true, noiseSuppression: true, autoGainControl: true } });
    if (voiceSession !== session || session.token !== voiceRequestToken) { stopMediaStream(stream); return; }
    session.stream = stream;
    const candidates = ["audio/webm;codecs=opus", "audio/webm", "audio/mp4"];
    const mimeType = candidates.find(function (candidate) { return MediaRecorder.isTypeSupported && MediaRecorder.isTypeSupported(candidate); });
    session.recorder = mimeType ? new MediaRecorder(stream, { mimeType: mimeType }) : new MediaRecorder(stream);
    session.recorder.addEventListener("dataavailable", function (event) { if (event.data && event.data.size) session.chunks.push(event.data); });
    session.recorder.addEventListener("error", function (event) { failVoiceSession(session, event.error || new Error("Recorder error")); });
    session.recorder.addEventListener("stop", function () { finalizeVoiceRecording(session); }, { once: true });
    stream.getTracks().forEach(function (track) {
      track.addEventListener("ended", function () { if (voiceSession === session && !session.discard && session.phase !== "stopping") finishVoiceRecording(); }, { once: true });
    });
    session.recorder.start(250);
    session.startedAt = performance.now();
    session.phase = "recording";
    startVoiceVisualizer(session);
    session.clockTimer = window.setInterval(function () { if (voiceSession === session) renderVoiceRecorder(); }, 250);
    scheduleVoiceLimit(session);
    renderVoiceRecorder();
    requestAnimationFrame(function () { if (voiceSession === session) $("pauseVoiceBtn").focus(); });
    announceVoice("Voice recording started.");
  } catch (error) {
    if (session.token !== voiceRequestToken) return;
    failVoiceSession(session, error);
  }
}
function finishVoiceRecording() {
  const session = voiceSession;
  if (!session || session.phase === "requesting" || session.phase === "stopping") return;
  session.phase = "stopping";
  clearVoiceTimers(session);
  renderVoiceRecorder();
  announceVoice("Finishing voice recording.");
  if (session.recorder && session.recorder.state !== "inactive") {
    try { session.recorder.stop(); } catch (error) { failVoiceSession(session, error); }
  } else finalizeVoiceRecording(session);
}
function cancelVoiceRecording(showNotice) {
  const session = voiceSession;
  if (!session) return false;
  session.discard = true;
  voiceRequestToken += 1;
  clearVoiceTimers(session);
  if (session.recorder && session.recorder.state !== "inactive") {
    try { session.recorder.stop(); } catch (error) { resetVoiceSession(session); }
  } else resetVoiceSession(session);
  if (showNotice) announceVoice("Recording discarded.");
  return true;
}
function finalizeVoiceRecording(session) {
  if (!session || session.finalized) return;
  session.finalized = true;
  const duration = voiceElapsedSeconds(session);
  const targetContactId = session.contactId;
  clearVoiceTimers(session);
  if (session.discard || voiceSession !== session) { resetVoiceSession(session); return; }
  const mimeType = (session.recorder && session.recorder.mimeType) || (session.chunks[0] && session.chunks[0].type) || "audio/webm";
  const blob = new Blob(session.chunks, { type: mimeType });
  resetVoiceSession(session);
  if (!blob.size || duration < 0.25) {
    showToast("Recording was too short", "Record for a little longer and try again.", "error");
    requestAnimationFrame(function () { if (!$("recordAudioBtn").disabled) $("recordAudioBtn").focus(); });
    return;
  }
  const extension = mimeType.indexOf("mp4") >= 0 ? "m4a" : mimeType.indexOf("ogg") >= 0 ? "ogg" : "webm";
  const attachment = {
    kind: "audio",
    source: "recording",
    name: "Voice message." + extension,
    type: mimeType,
    size: blob.size,
    duration: duration,
    blob: blob,
    url: URL.createObjectURL(blob)
  };
  announceVoice("Sending voice message.");
  sendMessage({ attachment: attachment, contactId: targetContactId, preserveComposer: true }).then(function (sent) {
    if (sent) {
      announceVoice("Voice message sent.");
      requestAnimationFrame(function () { $("messageInput").focus(); });
    } else if (attachment.url && attachment.url.indexOf("blob:") === 0 && !attachmentStorageId(attachment)) {
      URL.revokeObjectURL(attachment.url);
    }
  });
}
function toggleVoicePause() {
  const session = voiceSession;
  if (!session || !session.recorder) return;
  try {
    if (session.phase === "recording" && session.recorder.state === "recording") {
      session.recorder.pause();
      session.pausedAt = performance.now();
      session.phase = "paused";
      window.clearTimeout(session.maxTimer);
      session.maxTimer = null;
      announceVoice("Voice recording paused.");
    } else if (session.phase === "paused" && session.recorder.state === "paused") {
      session.recorder.resume();
      session.totalPausedMs += performance.now() - session.pausedAt;
      session.pausedAt = 0;
      session.phase = "recording";
      scheduleVoiceLimit(session);
      announceVoice("Voice recording resumed.");
    }
    renderVoiceRecorder();
  } catch (error) { failVoiceSession(session, error); }
}
function releasePendingAttachment() {
  if (pendingAttachment && pendingAttachment.url && pendingAttachment.url.indexOf("blob:") === 0) {
    const id = attachmentStorageId(pendingAttachment);
    const cached = id && mediaUrlCache.get(id) === pendingAttachment.url;
    if (!cached) URL.revokeObjectURL(pendingAttachment.url);
  }
  pendingAttachment = null;
  const preview = $("attachmentAudioPreview");
  if (preview) {
    preview.pause();
    preview.removeAttribute("src");
    preview.load();
  }
}
function detectAttachmentKind(file) {
  const type = String(file && file.type || "").toLowerCase();
  const name = String(file && file.name || "").toLowerCase();
  if (attachmentMode === "audio") {
    if (!type.startsWith("audio/") && !/\.(mp3|m4a|aac|wav|ogg|oga|webm)$/i.test(name)) throw new Error("Choose a supported audio file.");
    return "audio";
  }
  if (attachmentMode === "image") {
    if (type.startsWith("image/") || /\.(jpe?g|png|gif|webp|avif|bmp)$/i.test(name)) return "image";
    if (type.startsWith("video/") || /\.(mp4|webm|mov|m4v)$/i.test(name)) return "video";
    throw new Error("Choose an image or video file.");
  }
  return "document";
}
function readImageMetadata(url) {
  return new Promise(function (resolve, reject) {
    const image = new Image();
    const timer = window.setTimeout(function () { reject(new Error("The image preview took too long to load.")); }, 5000);
    image.addEventListener("load", function () {
      window.clearTimeout(timer);
      resolve({ width: image.naturalWidth, height: image.naturalHeight });
    }, { once: true });
    image.addEventListener("error", function () {
      window.clearTimeout(timer);
      reject(new Error("This image could not be previewed."));
    }, { once: true });
    image.src = url;
  });
}
function readTimedMediaMetadata(kind, url) {
  return new Promise(function (resolve, reject) {
    const media = document.createElement(kind === "video" ? "video" : "audio");
    media.preload = "metadata";
    if (kind === "video") media.muted = true;
    const timer = window.setTimeout(function () {
      media.removeAttribute("src");
      reject(new Error(kind === "video" ? "The video preview took too long to load." : "The audio file took too long to load."));
    }, 6000);
    media.addEventListener("loadedmetadata", function () {
      window.clearTimeout(timer);
      const result = {
        duration: Number.isFinite(media.duration) && media.duration !== Infinity ? media.duration : 0
      };
      if (kind === "video") {
        result.width = media.videoWidth || 0;
        result.height = media.videoHeight || 0;
      }
      media.removeAttribute("src");
      resolve(result);
    }, { once: true });
    media.addEventListener("error", function () {
      window.clearTimeout(timer);
      media.removeAttribute("src");
      reject(new Error(kind === "video" ? "This video format cannot be previewed." : "This audio file cannot be played."));
    }, { once: true });
    media.src = url;
    media.load();
  });
}
async function prepareImmediateAttachment(file) {
  if (!file || !file.size) throw new Error("Choose a file that is not empty.");
  const kind = detectAttachmentKind(file);
  const limits = { image: 15, video: 40, audio: 25, document: 20 };
  const maxBytes = limits[kind] * 1024 * 1024;
  if (file.size > maxBytes) throw new Error("Choose a " + kind + " file smaller than " + limits[kind] + " MB.");
  const url = URL.createObjectURL(file);
  const attachment = {
    kind: kind,
    source: "upload",
    name: file.name || (kind === "image" ? "Image" : kind === "video" ? "Video" : kind === "audio" ? "Audio file" : "Document"),
    size: file.size,
    type: file.type || "application/octet-stream",
    blob: file,
    url: url
  };
  try {
    if (kind === "image") Object.assign(attachment, await readImageMetadata(url));
    if (kind === "video" || kind === "audio") Object.assign(attachment, await readTimedMediaMetadata(kind, url));
    return attachment;
  } catch (error) {
    URL.revokeObjectURL(url);
    throw error;
  }
}
async function readAttachment(file) {
  $("fileInput").value = "";
  if (!file) return;
  if (sendInProgress) {
    showToast("Please wait", "The current attachment is still being sent.", "error");
    return;
  }
  const contact = activeContact();
  if (!contact || contact.blocked) {
    showToast("Attachment not sent", "Choose an active, unblocked conversation first.", "error");
    return;
  }
  const targetContactId = contact.id;
  closePanels();
  sendInProgress = true;
  updateComposer();
  let attachment = null;
  let sent = false;
  try {
    attachment = await prepareImmediateAttachment(file);
    sent = await sendMessage({
      attachment: attachment,
      contactId: targetContactId,
      preserveComposer: true,
      lockHeld: true
    });
  } catch (error) {
    showToast("Attachment not sent", error && error.message ? error.message : "Try another file.", "error");
  } finally {
    if (!sent && attachment && attachment.url && attachment.url.indexOf("blob:") === 0) {
      const id = attachmentStorageId(attachment);
      if (!id || mediaUrlCache.get(id) !== attachment.url) URL.revokeObjectURL(attachment.url);
    }
    if (sendInProgress) {
      sendInProgress = false;
      updateComposer();
    }
    requestAnimationFrame(function () {
      if (!$("messageInput").readOnly && !$("messageInput").disabled) $("messageInput").focus();
    });
  }
}
function updateDeliveryStatus(message) {
  const row = Array.from(document.querySelectorAll("[data-message-id]")).find(function (element) { return element.dataset.messageId === String(message.id); });
  if (!row) return;
  const delivery = row.querySelector(".delivery");
  if (!delivery) return;
  delivery.className = "delivery " + (message.status || "sent");
  delivery.textContent = message.status === "read" ? "\u2713\u2713" : message.status === "delivered" ? "\u2713\u2713" : message.status === "failed" ? "Failed" : message.status === "sending" ? "\u2026" : "\u2713";
  delivery.setAttribute("aria-label", message.status || "sent");
}

async function sendMessage(options) {
  const config = options || {};
  if (sendInProgress && !config.lockHeld) return false;
  const contact = config.contactId == null ? activeContact() : state.contacts.find(function (item) { return item.id === config.contactId; });
  if (!contact || contact.blocked) {
    if (config.lockHeld) {
      sendInProgress = false;
      updateComposer();
    }
    showToast("Message not sent", "Unblock this contact before sending.", "error");
    return false;
  }
  const input = $("messageInput");
  const preserveComposer = Boolean(config.preserveComposer);
  const body = typeof config.body === "string" ? config.body.trim() : preserveComposer ? "" : input.value.trim();
  const queuedAttachment = config.attachment || pendingAttachment;
  if (!body && !queuedAttachment) {
    if (config.lockHeld) {
      sendInProgress = false;
      updateComposer();
    }
    return false;
  }
  if (!config.lockHeld) sendInProgress = true;
  updateComposer();
  let mediaStorageFailed = false;
  try {
    let attachmentCopy = null;
    if (queuedAttachment) {
      attachmentCopy = Object.assign({}, queuedAttachment);
      const blob = queuedAttachment.blob;
      if (blob) {
        const mediaId = queuedAttachment.mediaId || queuedAttachment.audioId || makeId("media");
        queuedAttachment.mediaId = mediaId;
        attachmentCopy.mediaId = mediaId;
        const liveUrl = queuedAttachment.url || URL.createObjectURL(blob);
        queuedAttachment.url = liveUrl;
        mediaUrlCache.set(mediaId, liveUrl);
        delete attachmentCopy.blob;
        delete attachmentCopy.url;
        try {
          await storeMediaBlob(mediaId, blob);
        } catch (error) {
          mediaStorageFailed = true;
          console.warn("Attachment will remain available only in this session.", error);
        }
      } else {
        delete attachmentCopy.blob;
      }
    }

    const message = {
      id: makeId("message"),
      from: "outgoing",
      body: body,
      timestamp: new Date().toISOString(),
      channel: $("typeInput").value,
      status: "sending"
    };
    if (replyTo && !preserveComposer) message.reply = replyTo.body || (replyTo.attachment && attachmentPreviewLabel(replyTo.attachment)) || "Attachment";
    if (attachmentCopy) message.attachment = attachmentCopy;
    contact.messages.push(message);
    contact.unanswered = false;

    if (!preserveComposer) {
      input.value = "";
      delete state.drafts[contact.id];
      replyTo = null;
    }
    if (pendingAttachment === queuedAttachment) releasePendingAttachment();
    renderReplyPreview();
    renderAttachmentPreview();
    autoResizeComposer();
    renderContacts();
    renderHeader();
    if (contact.id === state.activeId) renderMessages(true);
    safeSave();
    if (mediaStorageFailed) showToast("Attachment sent", "It will remain playable until this tab is closed.");

    window.setTimeout(function () {
      message.status = navigator.onLine ? "delivered" : "sent";
      updateDeliveryStatus(message);
      safeSave();
    }, 650);
    window.setTimeout(function () {
      if (navigator.onLine) {
        message.status = "read";
        updateDeliveryStatus(message);
        safeSave();
      }
    }, 1700);
    return true;
  } catch (error) {
    console.error("Could not send message.", error);
    showToast("Message not sent", "The local preview could not save this attachment.", "error");
    return false;
  } finally {
    sendInProgress = false;
    updateComposer();
  }
}
function openConversationSearch() {
  clearMessageSelection(false);
  closePanels();
  $("conversationSearch").hidden = false;
  requestAnimationFrame(function () { $("messageSearchInput").focus(); });
  renderMessages(false);
}

function closeConversationSearch() {
  $("conversationSearch").hidden = true;
  $("messageSearchInput").value = "";
  renderMessages(false);
  $("conversationSearchBtn").focus();
}

function exportTranscript() {
  const contact = activeContact();
  if (!contact) return;
  const lines = [contact.name + " · " + contact.phone, ""];
  contact.messages.forEach(function (message) {
    const content = message.body || (message.attachment ? "[Attachment: " + message.attachment.name + "]" : "[Empty message]");
    lines.push("[" + new Date(message.timestamp).toLocaleString() + "] " + (message.from === "outgoing" ? "You" : contact.name) + " (" + message.channel + "): " + content);
  });
  const blob = new Blob([lines.join("\n")], { type: "text/plain" });
  const url = URL.createObjectURL(blob);
  const link = document.createElement("a");
  link.href = url;
  link.download = contact.name.toLowerCase().replace(/[^a-z0-9]+/g, "-") + "-conversation.txt";
  document.body.append(link);
  link.click();
  link.remove();
  URL.revokeObjectURL(url);
  showToast("Transcript exported", "The local text file is ready.");
}

async function clearConversation() {
  const contact = activeContact();
  if (!contact) return;
  const confirmed = await askConfirmation({
    title: "Clear this conversation?",
    description: "This removes every message from the local preview. This action cannot be undone.",
    accept: "Clear messages"
  });
  if (!confirmed) return;
  clearMessageSelection(false);
  closeMessageActionMenu(false);
  replyTo = null;
  renderReplyPreview();
  const mediaIds = contact.messages.map(function (message) { return attachmentStorageId(message.attachment); }).filter(Boolean);
  await Promise.all(Array.from(new Set(mediaIds)).map(function (id) { return deleteMediaBlob(id); }));
  contact.messages = [];
  renderMessages(true);
  renderContacts();
  renderHeader();
  safeSave();
  showToast("Conversation cleared", "All local messages were removed.");
}

function handleMenuAction(action) {
  closePanels();
  const contact = activeContact();
  if (!contact) return;
  if (action === "resolve") toggleResolved();
  if (action === "details") openDrawer($("conversationMenuBtn"));
  if (action === "search") openConversationSearch();
  if (action === "unread") {
    contact.unread = Math.max(1, contact.unread || 0);
    renderContacts();
    safeSave();
    showToast("Marked unread", "The conversation now appears in the Unread filter.");
  }
  if (action === "export") exportTranscript();
  if (action === "block") toggleBlocked();
  if (action === "clear") clearConversation();
}

function openNewConversation() {
  closePanels();
  $("newConversationForm").reset();
  $("newConversationDialog").showModal();
  requestAnimationFrame(function () { $("newContactName").focus(); });
}

function createConversation(event) {
  event.preventDefault();
  const name = $("newContactName").value.trim();
  const address = $("newContactAddress").value.trim();
  const category = $("newContactCategory").value;
  const firstMessage = $("newContactMessage").value.trim();
  if (!name || !address) return;
  const id = Math.max.apply(null, state.contacts.map(function (contact) { return contact.id; })) + 1;
  const contact = {
    id: id, name: name,
    phone: address.indexOf("@") >= 0 ? "" : address,
    email: address.indexOf("@") >= 0 ? address : "",
    category: category, online: false, lastSeen: "New contact", unread: 0,
    unanswered: !firstMessage, ai: false, blocked: false,
    course: "Not set", timezone: "Africa/Casablanca", tags: ["New contact"], notes: "",
    messages: firstMessage ? [{ id: makeId("message"), from: "outgoing", body: firstMessage, timestamp: new Date().toISOString(), channel: "WhatsApp", status: "sent" }] : []
  };
  state.contacts.push(contact);
  state.category = category;
  state.filter = "newest";
  state.activeId = id;
  document.querySelectorAll("[data-category]").forEach(function (button) { button.setAttribute("aria-pressed", String(button.dataset.category === category)); });
  renderStatusFilter();
  $("newConversationDialog").close();
  renderContacts();
  selectContact(id, true);
  safeSave();
  showToast("Conversation created", "You can continue with " + name + ".");
}

function applyTheme(theme) {
  state.theme = theme;
  document.body.classList.toggle("dark", theme === "dark");
  $("themeToggle").setAttribute("aria-pressed", String(theme === "dark"));
  $("themeToggle").setAttribute("aria-label", theme === "dark" ? "Use light theme" : "Use dark theme");
  safeSave();
}

function setCategory(category) {
  clearMessageSelection(false);
  closeMessageActionMenu(false);
  const previous = activeContact();
  state.category = category;
  document.querySelectorAll("[data-category]").forEach(function (button) { button.setAttribute("aria-pressed", String(button.dataset.category === category)); });
  $("appShell").classList.remove("conversation-open");
  renderContacts();
  if (!window.matchMedia("(max-width: 759px)").matches && (!previous || previous.category !== category)) {
    const first = currentContacts()[0];
    if (first) selectContact(first.id, false);
    else {
      state.activeId = null;
      renderHeader();
    }
  }
  safeSave();
}

function setFilter(filter) {
  state.filter = normalizeConversationFilter(filter);
  renderStatusFilter();
  renderContacts();
  safeSave();
}

function clearFilters() {
  $("searchInput").value = "";
  $("clearSearchBtn").hidden = true;
  state.filter = "newest";
  renderStatusFilter();
  renderContacts();
  safeSave();
  $("searchInput").focus();
}

function updateNetworkState() {
  $("connectionBanner").hidden = navigator.onLine;
}

document.querySelectorAll("[data-category]").forEach(function (button) {
  button.addEventListener("click", function () { setCategory(button.dataset.category); });
});
$("statusFilterBtn").addEventListener("click", function (event) {
  event.stopPropagation();
  togglePanel("statusFilterMenu", $("statusFilterBtn"));
});
$("statusFilterBtn").addEventListener("keydown", function (event) {
  if (!["ArrowDown", "ArrowUp"].includes(event.key)) return;
  event.preventDefault();
  event.stopPropagation();
  if ($("statusFilterMenu").hidden) {
    togglePanel("statusFilterMenu", $("statusFilterBtn"));
    if (event.key === "ArrowUp") requestAnimationFrame(function () {
      const items = $("statusFilterMenu").querySelectorAll("[data-filter]");
      if (items.length) items[items.length - 1].focus();
    });
  }
});
$("statusFilterMenu").addEventListener("click", function (event) {
  const button = event.target.closest("[data-filter]");
  if (!button) return;
  setFilter(button.dataset.filter);
  closePanels();
  $("statusFilterBtn").focus();
});
$("statusFilterMenu").addEventListener("keydown", function (event) {
  const items = Array.from($("statusFilterMenu").querySelectorAll("[data-filter]"));
  const current = items.indexOf(document.activeElement);
  if (event.key === "Escape") {
    event.preventDefault();
    closePanels();
    $("statusFilterBtn").focus();
    return;
  }
  if (!["ArrowDown", "ArrowUp", "Home", "End"].includes(event.key)) return;
  event.preventDefault();
  let next = current < 0 ? 0 : current;
  if (event.key === "ArrowDown") next = (next + 1) % items.length;
  if (event.key === "ArrowUp") next = (next - 1 + items.length) % items.length;
  if (event.key === "Home") next = 0;
  if (event.key === "End") next = items.length - 1;
  items[next].focus();
});
$("statusFilterMenu").addEventListener("focusout", function () {
  requestAnimationFrame(function () {
    if (!$("statusFilterMenu").contains(document.activeElement) && document.activeElement !== $("statusFilterBtn")) closePanels();
  });
});

$("searchInput").addEventListener("input", function () {
  $("clearSearchBtn").hidden = !$("searchInput").value;
  renderContacts();
});
$("clearSearchBtn").addEventListener("click", function () {
  $("searchInput").value = "";
  $("clearSearchBtn").hidden = true;
  renderContacts();
  $("searchInput").focus();
});
$("clearFiltersBtn").addEventListener("click", clearFilters);
$("mobileBack").addEventListener("click", function () {
  if (voiceSession) cancelVoiceRecording(true);
  clearMessageSelection(false);
  closeMessageActionMenu(false);
  $("appShell").classList.remove("conversation-open");
  const option = $("contact-option-" + state.activeId);
  if (option) requestAnimationFrame(function () { option.focus(); });
});

$("activeContactButton").addEventListener("click", function () { openDrawer($("activeContactButton")); });
$("btnGetStudentsDetails").addEventListener("click", function () { openDrawer($("btnGetStudentsDetails")); });
$("closeOverview").addEventListener("click", closeDrawer);
$("drawerBackdrop").addEventListener("click", closeDrawer);
$("contactDrawer").addEventListener("click", function (event) {
  const button = event.target.closest("[data-copy-value]");
  if (!button || button.disabled || !$("contactDrawer").contains(button)) return;
  copyOverviewValue(button);
});
$("contactDrawer").addEventListener("keydown", function (event) {
  if (event.key !== "Tab" || !$("appShell").classList.contains("details-open")) return;
  const focusable = Array.from($("contactDrawer").querySelectorAll('button:not([disabled]), textarea:not([disabled]), input:not([disabled]), select:not([disabled]), a[href], [tabindex]:not([tabindex="-1"])')).filter(function (element) {
    return !element.hidden && element.getAttribute("aria-hidden") !== "true" && element.getClientRects().length;
  });
  if (!focusable.length) {
    event.preventDefault();
    $("closeOverview").focus();
    return;
  }
  const first = focusable[0];
  const last = focusable[focusable.length - 1];
  if (event.shiftKey && document.activeElement === first) {
    event.preventDefault();
    last.focus();
  } else if (!event.shiftKey && document.activeElement === last) {
    event.preventDefault();
    first.focus();
  }
});
$("btnMarkAnswered").addEventListener("click", toggleResolved);
$("drawerResolveBtn").addEventListener("click", toggleResolved);
$("btnBlockUser").addEventListener("click", toggleBlocked);
$("unblockBannerBtn").addEventListener("click", toggleBlocked);

$("conversationMenuBtn").addEventListener("click", function (event) {
  event.stopPropagation();
  togglePanel("conversationMenu", $("conversationMenuBtn"));
});
$("conversationMenu").addEventListener("click", function (event) {
  const item = event.target.closest("[data-menu-action]");
  if (item) handleMenuAction(item.dataset.menuAction);
});
$("conversationSearchBtn").addEventListener("click", openConversationSearch);
$("closeMessageSearch").addEventListener("click", closeConversationSearch);
$("messageSearchInput").addEventListener("input", function () { renderMessages(false); });

$("composerSpeedDialBtn").addEventListener("click", function (event) {
  event.stopPropagation();
  togglePanel("composerSpeedDial", $("composerSpeedDialBtn"));
});
$("composerSpeedDialBtn").addEventListener("keydown", function (event) {
  if (event.key !== "ArrowDown" && event.key !== "ArrowUp") return;
  event.preventDefault();
  const wasHidden = $("composerSpeedDial").hidden;
  if (wasHidden) togglePanel("composerSpeedDial", $("composerSpeedDialBtn"));
  const items = Array.from($("composerSpeedDial").querySelectorAll("[role='menuitem']:not(:disabled)"));
  const target = event.key === "ArrowUp" ? items[items.length - 1] : items[0];
  if (target) requestAnimationFrame(function () { target.focus(); });
});
$("composerSpeedDial").addEventListener("keydown", function (event) {
  if (event.defaultPrevented) return;
  const items = Array.from($("composerSpeedDial").querySelectorAll("[role='menuitem']:not(:disabled)"));
  const current = items.indexOf(document.activeElement);
  if (event.key === "Escape") {
    event.preventDefault();
    event.stopPropagation();
    closePanels();
    $("composerSpeedDialBtn").focus();
    return;
  }
  if (!["ArrowDown", "ArrowUp", "Home", "End"].includes(event.key) || !items.length) return;
  event.preventDefault();
  let next = current < 0 ? 0 : current;
  if (event.key === "ArrowDown") next = (next + 1) % items.length;
  if (event.key === "ArrowUp") next = (next - 1 + items.length) % items.length;
  if (event.key === "Home") next = 0;
  if (event.key === "End") next = items.length - 1;
  items[next].focus();
});
$("composerSpeedDial").addEventListener("focusout", function () {
  requestAnimationFrame(function () {
    if (!$("composerSpeedDial").hidden && !$("composerSpeedDial").contains(document.activeElement) && document.activeElement !== $("composerSpeedDialBtn")) closePanels();
  });
});

$("attachmentBtn").addEventListener("click", function (event) {
  event.stopPropagation();
  togglePanel("attachmentMenu", $("attachmentBtn"));
});
$("attachmentMenu").addEventListener("click", function (event) {
  const item = event.target.closest("[data-attachment]");
  if (!item) return;
  attachmentMode = item.dataset.attachment;
  $("fileInput").accept = attachmentMode === "image" ? "image/*,video/*" : attachmentMode === "audio" ? "audio/*" : ".pdf,.doc,.docx,.zip,.txt,application/pdf";
  $("fileInput").click();
});
$("fileInput").addEventListener("change", function () { readAttachment($("fileInput").files[0]); });
$("removeAttachmentBtn").addEventListener("click", function () {
  releasePendingAttachment();
  renderAttachmentPreview();
  updateComposer();
});
$("recordAudioBtn").addEventListener("click", startVoiceRecording);
$("pauseVoiceBtn").addEventListener("click", toggleVoicePause);
$("cancelVoiceBtn").addEventListener("click", function () { cancelVoiceRecording(true); requestAnimationFrame(function () { $("recordAudioBtn").focus(); }); });
$("stopVoiceBtn").addEventListener("click", finishVoiceRecording);
$("typeInput").addEventListener("click", function (event) {
  event.stopPropagation();
  togglePanel("channelMenu", $("typeInput"));
});
$("typeInput").addEventListener("keydown", function (event) {
  if (event.key !== "ArrowRight") return;
  event.preventDefault();
  event.stopPropagation();
  if ($("channelMenu").hidden) togglePanel("channelMenu", $("typeInput"));
});
$("channelMenu").addEventListener("click", function (event) {
  const option = event.target.closest("[data-channel-value]");
  if (!option) return;
  selectMessageChannel(option.dataset.channelValue);
});
$("channelMenu").addEventListener("keydown", function (event) {
  const items = Array.from($("channelMenu").querySelectorAll("[data-channel-value]"));
  const current = items.indexOf(document.activeElement);
  if (event.key === "Escape") {
    event.preventDefault();
    event.stopPropagation();
    closePanels();
    $("composerSpeedDialBtn").focus();
    return;
  }
  if (!["ArrowDown", "ArrowUp", "Home", "End"].includes(event.key)) return;
  event.preventDefault();
  let next = current < 0 ? 0 : current;
  if (event.key === "ArrowDown") next = (next + 1) % items.length;
  if (event.key === "ArrowUp") next = (next - 1 + items.length) % items.length;
  if (event.key === "Home") next = 0;
  if (event.key === "End") next = items.length - 1;
  if (items[next]) items[next].focus();
});
$("channelMenu").addEventListener("focusout", function () {
  requestAnimationFrame(function () {
    if (!$("channelMenu").hidden && !$("channelMenu").contains(document.activeElement) && document.activeElement !== $("typeInput")) closePanels();
  });
});
$("channelMenuClose").addEventListener("click", function () {
  closePanels();
  $("composerSpeedDialBtn").focus();
});
$("typeInput").addEventListener("change", function () {
  syncChannelPicker();
  if (voiceSession && !selectedChannelAllowsVoice()) cancelVoiceRecording(true);
  updateComposer();
});

$("btnEmoji").addEventListener("click", function (event) {
  event.stopPropagation();
  openEmojiPicker();
});
$("emojiPanel").addEventListener("click", function (event) {
  const emojiButton = event.target.closest("#emojiGrid button");
  if (emojiButton) {
    insertEmojiGlyph(emojiButton.dataset.emojiGlyph || emojiButton.textContent);
    emojiButton.focus();
    return;
  }
  const categoryButton = event.target.closest("[data-emoji-category]");
  if (categoryButton) {
    activeEmojiCategory = categoryButton.dataset.emojiCategory;
    $("emojiSearchInput").value = "";
    renderEmojiCategories();
    renderEmojiGrid(0);
    return;
  }
  const toneButton = event.target.closest("[data-tone-index]");
  if (toneButton) {
    state.emojiTone = Number(toneButton.dataset.toneIndex) || 0;
    renderEmojiTonePicker();
    renderEmojiGrid(0);
    safeSave();
  }
});
$("emojiSearchInput").addEventListener("input", function () { renderEmojiGrid(); });
$("emojiSearchInput").addEventListener("keydown", function (event) {
  if (event.key === "ArrowDown") {
    const first = $("emojiGrid").querySelector("button");
    if (first) { event.preventDefault(); first.focus(); }
  }
});
$("clearEmojiSearch").addEventListener("click", function () {
  $("emojiSearchInput").value = "";
  renderEmojiGrid();
  $("emojiSearchInput").focus();
});
$("emojiGrid").addEventListener("keydown", function (event) { moveEmojiGridFocus(event); });
$("emojiCategories").addEventListener("keydown", function (event) {
  if (!["ArrowLeft", "ArrowRight", "Home", "End"].includes(event.key)) return;
  const tabs = Array.from($("emojiCategories").querySelectorAll("[role='tab']"));
  const current = tabs.indexOf(event.target);
  if (current < 0) return;
  event.preventDefault();
  let next = current;
  if (event.key === "ArrowRight") next = (current + 1) % tabs.length;
  if (event.key === "ArrowLeft") next = (current - 1 + tabs.length) % tabs.length;
  if (event.key === "Home") next = 0;
  if (event.key === "End") next = tabs.length - 1;
  activeEmojiCategory = tabs[next].dataset.emojiCategory;
  $("emojiSearchInput").value = "";
  renderEmojiCategories();
  renderEmojiGrid();
  const selectedTab = $("emojiCategories").querySelector('[data-emoji-category="' + activeEmojiCategory + '"]');
  if (selectedTab) selectedTab.focus();
});
$("quickRepliesBtn").addEventListener("click", function (event) {
  event.stopPropagation();
  renderTemplates("");
  $("templateSearchInput").value = "";
  togglePanel("templatePanel", $("quickRepliesBtn"));
});
$("railTemplatesBtn").addEventListener("click", function () {
  renderTemplates("");
  $("templateSearchInput").value = "";
  togglePanel("templatePanel", $("quickRepliesBtn"));
});
$("templateSearchInput").addEventListener("input", function () { renderTemplates($("templateSearchInput").value); });
document.querySelectorAll(".popup-close").forEach(function (button) { button.addEventListener("click", function () { if (button.closest("#emojiPanel")) closeEmojiPicker(true); else closePanels(); }); });
$("sendGreetingBtn").addEventListener("click", function () {
  closePanels();
  insertAtCaret("Hello! Welcome to Boston English Center 👋 ");
});

$("messageActionBackdrop").addEventListener("click", function () { closeMessageActionMenu(true); });
$("messageActionClose").addEventListener("click", function () { closeMessageActionMenu(true); });
$("messageActionMenu").addEventListener("click", function (event) {
  const item = event.target.closest("[data-message-action]");
  if (!item || item.disabled) return;
  handleMessageAction(item.dataset.messageAction);
});
$("messageActionMenu").addEventListener("keydown", function (event) {
  const menu = $("messageActionMenu");
  const items = Array.from(menu.querySelectorAll("[role='menuitem']:not(:disabled)"));
  const current = items.indexOf(document.activeElement);
  if (event.key === "Escape") {
    event.preventDefault();
    event.stopPropagation();
    closeMessageActionMenu(true);
    return;
  }
  if (event.key === "Tab") {
    const focusable = [$("messageActionClose")].concat(items).filter(function (item) {
      return !item.hidden && item.getClientRects().length;
    });
    if (!focusable.length) return;
    const first = focusable[0];
    const last = focusable[focusable.length - 1];
    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
    return;
  }
  if (!["ArrowDown", "ArrowUp", "Home", "End"].includes(event.key) || !items.length) return;
  event.preventDefault();
  let next = current < 0 ? 0 : current;
  if (event.key === "ArrowDown") next = (next + 1) % items.length;
  if (event.key === "ArrowUp") next = (next - 1 + items.length) % items.length;
  if (event.key === "Home") next = 0;
  if (event.key === "End") next = items.length - 1;
  items[next].focus();
});
$("messageActionMenu").addEventListener("focusout", function () {
  requestAnimationFrame(function () {
    const menu = $("messageActionMenu");
    if (!menu.hidden && !menu.contains(document.activeElement) && document.activeElement !== activeMessageActionTrigger) closeMessageActionMenu(false);
  });
});
$("copySelectedMessages").addEventListener("click", copySelectedMessages);
$("pinSelectedMessages").addEventListener("click", togglePinSelectedMessages);
$("deleteSelectedMessages").addEventListener("click", deleteSelectedMessages);
$("clearMessageSelection").addEventListener("click", function () { clearMessageSelection(true, true); });

$("cancelReplyBtn").addEventListener("click", function () { replyTo = null; renderReplyPreview(); });
$("messageInput").addEventListener("input", autoResizeComposer);
$("messageInput").addEventListener("compositionstart", function () { isComposing = true; });
$("messageInput").addEventListener("compositionend", function () { isComposing = false; });
$("messageInput").addEventListener("keydown", function (event) {
  if (event.key === "Enter" && !event.shiftKey && !isComposing) {
    event.preventDefault();
    if (!$("sendMessage").disabled) sendMessage();
  }
});
$("message-form").addEventListener("submit", function (event) { event.preventDefault(); sendMessage(); });
$("boxMessagesScroll").addEventListener("scroll", function () {
  const scroller = $("boxMessagesScroll");
  if (!$("messageActionMenu").hidden) closeMessageActionMenu(false);
  $("scrollLatestBtn").hidden = scroller.scrollHeight - scroller.scrollTop - scroller.clientHeight < 180;
});
$("scrollLatestBtn").addEventListener("click", function () {
  $("boxMessagesScroll").scrollTo({ top: $("boxMessagesScroll").scrollHeight, behavior: "smooth" });
});

$("emptyNewConversationBtn").addEventListener("click", openNewConversation);
$("newConversationForm").addEventListener("submit", createConversation);
$("shortcutsBtn").addEventListener("click", function () { $("shortcutsDialog").showModal(); });
$("themeToggle").addEventListener("click", function () { applyTheme(state.theme === "dark" ? "light" : "dark"); });
$("contactNotes").addEventListener("input", function () {
  const contact = activeContact();
  if (!contact) return;
  contact.notes = $("contactNotes").value;
  window.clearTimeout(noteSaveTimer);
  noteSaveTimer = window.setTimeout(safeSave, 300);
});

$("confirmCancel").addEventListener("click", function () { resolveConfirmation(false); });
$("confirmAccept").addEventListener("click", function () { resolveConfirmation(true); });
$("confirmDialog").addEventListener("cancel", function (event) { event.preventDefault(); resolveConfirmation(false); });
$("confirmDialog").addEventListener("close", function () { if (confirmResolver) resolveConfirmation(false); });
function updateMediaPreviewPlayButton() {
  const video = $("mediaPreviewVideo");
  const button = $("mediaPreviewPlay");
  const playing = !video.paused && !video.ended;
  button.replaceChildren(makeIcon(playing ? "i-pause" : "i-play"));
  button.setAttribute("aria-label", playing ? "Pause video preview" : "Play video preview");
  button.classList.toggle("is-playing", playing);
}
function toggleMediaPreviewVideo() {
  const video = $("mediaPreviewVideo");
  if (video.hidden || !video.src) return;
  if (video.paused || video.ended) {
    video.play().then(updateMediaPreviewPlayButton).catch(function () { showToast("Video unavailable", "This video could not be played.", "error"); });
  } else {
    video.pause();
    updateMediaPreviewPlayButton();
  }
}
$("mediaPreviewPlay").addEventListener("click", toggleMediaPreviewVideo);
$("mediaPreviewVideo").addEventListener("click", toggleMediaPreviewVideo);
$("mediaPreviewVideo").addEventListener("loadedmetadata", function () {
  $("mediaPreviewPlay").disabled = false;
  updateMediaPreviewPlayButton();
});
$("mediaPreviewVideo").addEventListener("play", function () {
  pauseOtherMedia($("mediaPreviewVideo"));
  updateMediaPreviewPlayButton();
});
$("mediaPreviewVideo").addEventListener("playing", updateMediaPreviewPlayButton);
$("mediaPreviewVideo").addEventListener("pause", updateMediaPreviewPlayButton);
$("mediaPreviewVideo").addEventListener("ended", updateMediaPreviewPlayButton);
$("mediaPreviewDialog").addEventListener("close", function () {
  const video = $("mediaPreviewVideo");
  const image = $("mediaPreviewImage");
  video.pause();
  video.removeAttribute("src");
  video.load();
  image.removeAttribute("src");
  image.alt = "";
  $("mediaPreviewPlay").hidden = true;
  $("mediaPreviewPlay").disabled = true;
  updateMediaPreviewPlayButton();
});
document.querySelectorAll("dialog").forEach(function (dialog) {
  dialog.addEventListener("click", function (event) {
    if (event.target === dialog) dialog.close();
  });
});
document.querySelectorAll(".dialog-close").forEach(function (button) {
  button.addEventListener("click", function () {
    const dialog = button.closest("dialog");
    if (dialog && dialog.open) dialog.close();
  });
});

document.addEventListener("pointerdown", function (event) {
  if (event.target.closest(".floating-panel") || event.target.closest("#conversationMenuBtn, #attachmentBtn, #composerSpeedDialBtn, #typeInput, #btnEmoji, #quickRepliesBtn, #railTemplatesBtn, #statusFilterBtn, .message-menu-trigger, #messageActionBackdrop")) return;
  closePanels();
});
document.addEventListener("keydown", function (event) {
  const tag = document.activeElement && document.activeElement.tagName;
  const isTyping = tag === "INPUT" || tag === "TEXTAREA" || tag === "SELECT";
  if (event.key === "/" && !isTyping && $("messageActionMenu").hidden && !$("newConversationDialog").open && !$("confirmDialog").open) {
    event.preventDefault();
    $("searchInput").focus();
  }
  if (event.key === "Escape") {
    if (document.querySelector("dialog[open]")) return;
    if (!$("messageActionMenu").hidden) { event.preventDefault(); closeMessageActionMenu(true); return; }
    if (selectedMessageIds.size) { event.preventDefault(); clearMessageSelection(true, true); return; }
    if (voiceSession) { event.preventDefault(); cancelVoiceRecording(true); requestAnimationFrame(function () { $("recordAudioBtn").focus(); }); return; }
    if (!$("channelMenu").hidden) { event.preventDefault(); closePanels(); $("composerSpeedDialBtn").focus(); return; }
    if (!$("composerSpeedDial").hidden) { event.preventDefault(); closePanels(); $("composerSpeedDialBtn").focus(); return; }
    if (!$("statusFilterMenu").hidden) { event.preventDefault(); closePanels(); $("statusFilterBtn").focus(); return; }
    if (!$("emojiPanel").hidden) { event.preventDefault(); closeEmojiPicker(true); return; }
    closePanels();
    if ($("conversationSearch").hidden === false) closeConversationSearch();
    else if ($("appShell").classList.contains("details-open")) closeDrawer();
  }
});

window.addEventListener("resize", function () {
  if (!$("messageActionMenu").hidden) closeMessageActionMenu(false);
});
window.addEventListener("online", function () { updateNetworkState(); showToast("Back online", "Message delivery is available again."); });
window.addEventListener("offline", function () { updateNetworkState(); showToast("You’re offline", "Changes will stay in this local preview.", "error"); });
function cleanupMediaResources() {
  voiceRequestToken += 1;
  const session = voiceSession;
  if (session) {
    voiceSession = null;
    session.discard = true;
    clearVoiceTimers(session);
    if (session.recorder && session.recorder.state !== "inactive") {
      try { session.recorder.stop(); } catch (error) { console.warn("Could not stop voice recorder.", error); }
    }
    stopMediaStream(session.stream);
    session.stream = null;
  }
  renderVoiceRecorder();
  updateComposer();
  mediaUrlCache.forEach(function (url) { URL.revokeObjectURL(url); });
  mediaUrlCache.clear();
}
window.addEventListener("beforeunload", function () { safeSave(); cleanupMediaResources(); });
window.addEventListener("pagehide", cleanupMediaResources);
window.addEventListener("pageshow", function (event) {
  renderVoiceRecorder();
  updateComposer();
  if (event.persisted) renderMessages(false);
});

function initialize() {
  applyTheme(state.theme);
  document.querySelectorAll("[data-category]").forEach(function (button) { button.setAttribute("aria-pressed", String(button.dataset.category === state.category)); });
  renderStatusFilter();
  state.emojiTone = Math.max(0, Math.min(5, Number(state.emojiTone) || 0));
  state.emojiRecents = Array.isArray(state.emojiRecents) ? state.emojiRecents.filter(function (glyph) { return typeof glyph === "string"; }).slice(0, 32) : [];
  renderEmojiTonePicker();
  renderEmojiCategories();
  renderEmojiGrid();
  renderTemplates("");
  syncChannelPicker();
  renderContacts();
  if (!activeContact()) {
    const first = currentContacts()[0] || state.contacts[0];
    state.activeId = first ? first.id : null;
  }
  const contact = activeContact();
  if (contact) {
    $("messageInput").value = state.drafts[contact.id] || "";
    renderHeader();
    autoResizeComposer();
    renderMessages(true);
  } else {
    renderHeader();
  }
  renderAttachmentPreview();
  renderReplyPreview();
  updateNetworkState();
}

initialize();










