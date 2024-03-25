<style>
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 100; font-display: swap; src: url("/fonts/inter/Inter-Thin.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 100; font-display: swap; src: url("/fonts/inter/Inter-ThinItalic.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 200; font-display: swap; src: url("/fonts/inter/Inter-ExtraLight.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 200; font-display: swap; src: url("/fonts/inter/Inter-ExtraLightItalic.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 300; font-display: swap; src: url("/fonts/inter/Inter-Light.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 300; font-display: swap; src: url("/fonts/inter/Inter-LightItalic.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 400; font-display: swap; src: url("/fonts/inter/Inter-Regular.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 400; font-display: swap; src: url("/fonts/inter/Inter-Italic.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 500; font-display: swap; src: url("/fonts/inter/Inter-Medium.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 500; font-display: swap; src: url("/fonts/inter/Inter-MediumItalic.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 600; font-display: swap; src: url("/fonts/inter/Inter-SemiBold.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 600; font-display: swap; src: url("/fonts/inter/Inter-SemiBoldItalic.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 700; font-display: swap; src: url("/fonts/inter/Inter-Bold.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 700; font-display: swap; src: url("/fonts/inter/Inter-BoldItalic.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 800; font-display: swap; src: url("/fonts/inter/Inter-ExtraBold.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 800; font-display: swap; src: url("/fonts/inter/Inter-ExtraBoldItalic.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: normal; font-weight: 900; font-display: swap; src: url("/fonts/inter/Inter-Black.woff2") format("woff2"); }
    @font-face { font-family: "Inter"; font-style: italic; font-weight: 900; font-display: swap; src: url("/fonts/inter/Inter-BlackItalic.woff2") format("woff2"); }

    .inter-font {
        font-family: "Inter" !important;
    }
</style>
<script src="https://cdn.tailwindcss.com"></script>
<div class="flex w-full h-full relative items-center isolate overflow-hidden bg-white inter-font">
    <svg class="absolute inset-0 -z-10 h-full w-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
      <defs>
        <pattern id="0787a7c5-978c-4f66-83c7-11c213f99cb7" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
          <path d="M.5 200V.5H200" fill="none" />
        </pattern>
      </defs>
      <rect width="100%" height="100%" stroke-width="0" fill="url(#0787a7c5-978c-4f66-83c7-11c213f99cb7)" />
    </svg>
    <div class="flex px-8 pr-0 items-center justify-center w-full">
      <div class="mx-auto w-3/5">
        <div class="mt-24 sm:mt-32 lg:mt-16">
            <h1 class="text-xl mb-1 font-semibold leading-none text-teal-600 text-center lg:text-left">
                Update content with Keyword Metrics
            </h1>
        </div>
        <h2 class="text-center lg:text-left text-3xl font-bold tracking-tight text-gray-900 md:text-6xl leading-tight md:leading-tight mr-20">
            {{$title}}
        </h2>
        <p class="mt-6 mr-20 text-2xl leading-8 text-gray-600 text-center lg:text-left line-clamp-3">
            {{$description}}
        </p>

      </div>
      <div class="mx-auto w-2/5">
        <div class="relative isolate overflow-hidden bg-teal-500 px-6 pt-8 sm:mx-auto sm:rounded-l-3xl sm:pl-8 sm:pr-0 sm:pt-8 lg:mx-0 lg:max-w-none">
            <div class="absolute -inset-y-px -left-3 -z-10 w-full origin-bottom-left skew-x-[-30deg] bg-teal-100 opacity-20 ring-1 ring-inset ring-white" aria-hidden="true"></div>
            <div class="mx-auto sm:mx-0 sm:max-w-none">
            <img src="{{asset("img/filters.png")}}" alt="Keyword filters" width="912" height="542" class="-mb-12 max-w-none rounded-tl-xl">
            </div>
            <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10 sm:rounded-l-3xl" aria-hidden="true"></div>
        </div>
      </div>
    </div>
  </div>
