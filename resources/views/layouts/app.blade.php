<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title ?? 'Mooney - Digital Experience Studio' }}</title>

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1" rel="stylesheet">

    <style>
        @layer base { 
            html, body { margin: 0; padding: 0; scroll-behavior: smooth; } 
            body { overscroll-behavior: none; } 
            main > :first-child { margin-top: 0 !important; } 
            main > :last-child { margin-bottom: 0 !important; } 
        } 
        ::-webkit-scrollbar { display: none; }
    </style>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "primary-fixed": "#e1e0ff",
                        "secondary": "#89ceff",
                        "on-secondary-container": "#00344e",
                        "on-secondary-fixed-variant": "#004c6e",
                        "tertiary-fixed-dim": "#7bd0ff",
                        "error-container": "#93000a",
                        "surface-tint": "#c0c1ff",
                        "surface-container-highest": "#31353c",
                        "inverse-surface": "#dfe2eb",
                        "on-primary-fixed-variant": "#2f2ebe",
                        "on-primary-container": "#0d0096",
                        "primary-fixed-dim": "#c0c1ff",
                        "tertiary-container": "#009bd1",
                        "error": "#ffb4ab",
                        "surface-dim": "#10141a",
                        "surface-container": "#1c2026",
                        "on-tertiary-container": "#002d40",
                        "on-error": "#690005",
                        "surface": "#10141a",
                        "outline": "#908fa0",
                        "inverse-primary": "#494bd6",
                        "surface-variant": "#31353c",
                        "on-tertiary-fixed-variant": "#004c69",
                        "on-surface-variant": "#c7c4d7",
                        "on-secondary": "#00344d",
                        "on-error-container": "#ffdad6",
                        "on-secondary-fixed": "#001e2f",
                        "tertiary-fixed": "#c4e7ff",
                        "surface-bright": "#353940",
                        "surface-container-low": "#181c22",
                        "on-tertiary-fixed": "#001e2c",
                        "primary": "#c0c1ff",
                        "primary-container": "#8083ff",
                        "inverse-on-surface": "#2d3137",
                        "outline-variant": "#464554",
                        "surface-container-high": "#262a31",
                        "surface-container-lowest": "#0a0e14",
                        "background": "#10141a",
                        "on-tertiary": "#00354a",
                        "on-primary-fixed": "#07006c",
                        "on-primary": "#1000a9",
                        "tertiary": "#7bd0ff",
                        "secondary-fixed-dim": "#89ceff",
                        "on-background": "#dfe2eb",
                        "on-surface": "#dfe2eb",
                        "secondary-fixed": "#c9e6ff",
                        "secondary-container": "#00a2e6"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "space-xs": "0.5rem",
                        "space-3xl": "4rem",
                        "space-lg": "1.5rem",
                        "space-md": "1rem",
                        "gutter-mobile": "1rem",
                        "space-2xl": "3rem",
                        "space-sm": "0.75rem",
                        "space-2xs": "0.25rem",
                        "space-4xl": "6rem",
                        "container-max": "1280px",
                        "space-xl": "2rem",
                        "gutter-desktop": "1.5rem"
                    },
                    "fontFamily": {
                        "headline-xl-mobile": ["Plus Jakarta Sans"],
                        "body-lg": ["Plus Jakarta Sans"],
                        "body-sm": ["Plus Jakarta Sans"],
                        "headline-md": ["Plus Jakarta Sans"],
                        "display-hero": ["Plus Jakarta Sans"],
                        "headline-lg": ["Plus Jakarta Sans"],
                        "label-md": ["Plus Jakarta Sans"],
                        "body-md": ["Plus Jakarta Sans"],
                        "headline-sm": ["Plus Jakarta Sans"],
                        "mono-code": ["JetBrains Mono"],
                        "label-sm": ["Plus Jakarta Sans"],
                        "display-hero-mobile": ["Plus Jakarta Sans"],
                        "headline-xl": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "headline-xl-mobile": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "400" }],
                        "body-sm": ["14px", { "lineHeight": "22px", "letterSpacing": "0.005em", "fontWeight": "400" }],
                        "headline-md": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.015em", "fontWeight": "600" }],
                        "display-hero": ["64px", { "lineHeight": "72px", "letterSpacing": "-0.03em", "fontWeight": "800" }],
                        "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "body-md": ["16px", { "lineHeight": "26px", "letterSpacing": "0em", "fontWeight": "400" }],
                        "headline-sm": ["20px", { "lineHeight": "28px", "letterSpacing": "-0.01em", "fontWeight": "600" }],
                        "mono-code": ["13px", { "lineHeight": "20px", "letterSpacing": "0em", "fontWeight": "500" }],
                        "label-sm": ["12px", { "lineHeight": "16px", "letterSpacing": "0.03em", "fontWeight": "600" }],
                        "display-hero-mobile": ["40px", { "lineHeight": "48px", "letterSpacing": "-0.02em", "fontWeight": "800" }],
                        "headline-xl": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.025em", "fontWeight": "700" }]
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-background font-body-md text-on-surface antialiased selection:bg-primary-container selection:text-white">
    
    @include('components.navbar')

    <main class="w-full pt-20 bg-background min-h-screen">
        <div class="flex flex-col w-full">
            {{ $slot }}
        </div>
    </main>

    @include('components.footer')

</body>
</html>