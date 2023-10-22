# Renick.Fonts

Just a simple OctoberCMS plugin for embedding fonts.

- [x] manage fonts in backend settings
- [x] auto generate css file after saving fonts
- [x] import Google Fonts (via Google Fonts API)
- [x] component, or combiner alais, for embedding the stylesheet

To install this plugin, you can just run the following command:
```bash
php artisan plugin:install Renick.Fonts
# or
php artisan plugin:install Renick.Blocs --from=git@github.com:renickbuettner/fonts-plugin.git --want=dev-main
```

Feel free to ask, raise ideas, mind bugs or contribute on the Github repository. Please create a new issue or pull
request.

---

You can put the stylesheet component within your layouts header, or use the combiner.

```twig
<link href="{{ [
    '~/storage/app/media/fonts/fonts.css',
    'your-files.scss',
]|theme }}" rel="stylesheet">
```

---

Currently, our main use-case is the import by the Google Fonts API.
If you have any other use-cases, please let us know.
