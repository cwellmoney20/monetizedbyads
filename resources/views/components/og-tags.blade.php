@if(isset($title) && isset($description))
<meta property="og:title" content="{{ $title }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="route('home')" />
<meta property="og:image" content="{{ route('og.serve') }}?img={{$uuid}}" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@iannuttall" />
<meta name="twitter:title" content="{{ $title }}" />
<meta name="twitter:description" content="{{ $description }}" />
<meta name="twitter:image" content="{{ route('og.serve') }}?img={{$uuid}}" />
@endif
