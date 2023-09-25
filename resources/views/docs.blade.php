<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Документация - {{ $version }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.10.3/swagger-ui.css" >
    <link rel="shortcut icon" href="https://cdn.jsdelivr.net/npm/@pkosiec/swagger-ui-dist/favicon-32x32.png" type="image/png">
</head>
<body>

<div id="swagger-ui"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.10.3/swagger-ui-bundle.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/4.10.3/swagger-ui-standalone-preset.js"> </script>
<script>
    window.onload = function() {
        const ui = SwaggerUIBundle({
            dom_id: '#swagger-ui',
            url: "{!! route('docs.file', ['version' => $version]) !!}",
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            deepLinking: true,
            layout: "StandaloneLayout"
        });
        window.ui = ui
    }
</script>
</body>
</html>
