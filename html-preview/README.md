# Local HTML previews

Open `index.html` in a browser, then choose a page. You can also serve this folder with `python -m http.server 8000` and open `http://localhost:8000/html-preview/`.

The HTML files are standalone previews of the 22 Blade files in the parent folder. They contain sample users, messages, and form values so the layouts can be tested without Laravel. Form submissions and chat messages stay in the browser; no backend requests are made.

The original folder did not include its Laravel layouts or referenced CSS, JavaScript, images, audio, and fonts. The previews therefore use local styling and replacement demo assets. They are useful for layout and interaction checks but are not a rendered production build.
