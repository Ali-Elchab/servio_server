<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories">
                                <a href="#endpoints-GETapi-categories">GET api/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-subcategories">
                                <a href="#endpoints-GETapi-subcategories">GET api/subcategories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-providers">
                                <a href="#endpoints-GETapi-providers">GET api/providers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-providers--provider_id-">
                                <a href="#endpoints-GETapi-providers--provider_id-">GET api/providers/{provider_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-providers--provider_id--ratings">
                                <a href="#endpoints-GETapi-providers--provider_id--ratings">GET api/providers/{provider_id}/ratings</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-register">
                                <a href="#endpoints-POSTapi-auth-register">POST api/auth/register</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-login">
                                <a href="#endpoints-POSTapi-auth-login">POST api/auth/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-auth-logout">
                                <a href="#endpoints-POSTapi-auth-logout">POST api/auth/logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-auth-delete">
                                <a href="#endpoints-DELETEapi-auth-delete">DELETE api/auth/delete</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-providers">
                                <a href="#endpoints-POSTapi-providers">POST api/providers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-providers--provider_id-">
                                <a href="#endpoints-PUTapi-providers--provider_id-">PUT api/providers/{provider_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-providers-me">
                                <a href="#endpoints-GETapi-providers-me">GET api/providers/me</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-providers-me-stats">
                                <a href="#endpoints-GETapi-providers-me-stats">GET api/providers/me/stats</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-cities">
                                <a href="#endpoints-GETapi-cities">GET api/cities</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-cities--city_id--areas">
                                <a href="#endpoints-GETapi-cities--city_id--areas">GET api/cities/{city_id}/areas</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-favorites">
                                <a href="#endpoints-GETapi-favorites">GET api/favorites</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-favorites--provider_id-">
                                <a href="#endpoints-POSTapi-favorites--provider_id-">POST api/favorites/{provider_id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 10, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-categories">GET api/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Data fetched successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;,
            &quot;slug&quot;: &quot;maintenance-utilities&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/category_images/01JYBJ3A11TCC99D2ENDFSGZ9D.webp&quot;,
            &quot;priority&quot;: 1,
            &quot;is_active&quot;: true
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Personal Care &amp; Wellness&quot;,
            &quot;slug&quot;: &quot;personal-care-wellness&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/category_images/01JYBJ3XKMY4TQ6R0BA1DM6S5G.webp&quot;,
            &quot;priority&quot;: 2,
            &quot;is_active&quot;: true
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Transport &amp; Delivery&quot;,
            &quot;slug&quot;: &quot;transport-delivery&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/category_images/01JYBJ4BPXSV3MN10W14VB4MC6.webp&quot;,
            &quot;priority&quot;: 3,
            &quot;is_active&quot;: true
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Tech Services&quot;,
            &quot;slug&quot;: &quot;tech-services&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/category_images/01JYBJ4Q7W2KNHM34V0YZ18XFM.webp&quot;,
            &quot;priority&quot;: 4,
            &quot;is_active&quot;: true
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories"
                    onclick="tryItOut('GETapi-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories"
                    onclick="cancelTryOut('GETapi-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-categories"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-categories"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-subcategories">GET api/subcategories</h2>

<p>
</p>



<span id="example-requests-GETapi-subcategories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/subcategories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/subcategories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-subcategories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Data fetched successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Electricity&quot;,
            &quot;slug&quot;: &quot;electricity&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/electricity.png&quot;,
            &quot;priority&quot;: 1,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 11,
            &quot;name&quot;: &quot;Barbers&quot;,
            &quot;slug&quot;: &quot;barbers&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/barbers.png&quot;,
            &quot;priority&quot;: 1,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Personal Care &amp; Wellness&quot;
            }
        },
        {
            &quot;id&quot;: 15,
            &quot;name&quot;: &quot;Mobile Repair&quot;,
            &quot;slug&quot;: &quot;mobile-repair&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/mobile-repair.png&quot;,
            &quot;priority&quot;: 1,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Tech Services&quot;
            }
        },
        {
            &quot;id&quot;: 20,
            &quot;name&quot;: &quot;Toktok Drivers&quot;,
            &quot;slug&quot;: &quot;toktok-drivers&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/toktok-drivers.png&quot;,
            &quot;priority&quot;: 1,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Transport &amp; Delivery&quot;
            }
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Plumbing&quot;,
            &quot;slug&quot;: &quot;plumbing&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/plumbing.png&quot;,
            &quot;priority&quot;: 2,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 12,
            &quot;name&quot;: &quot;Hair &amp; Makeup&quot;,
            &quot;slug&quot;: &quot;hair-makeup&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/hair-makeup.png&quot;,
            &quot;priority&quot;: 2,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Personal Care &amp; Wellness&quot;
            }
        },
        {
            &quot;id&quot;: 16,
            &quot;name&quot;: &quot;Laptop Repair&quot;,
            &quot;slug&quot;: &quot;laptop-repair&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/laptop-repair.png&quot;,
            &quot;priority&quot;: 2,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Tech Services&quot;
            }
        },
        {
            &quot;id&quot;: 21,
            &quot;name&quot;: &quot;Movers&quot;,
            &quot;slug&quot;: &quot;movers&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/movers.png&quot;,
            &quot;priority&quot;: 2,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Transport &amp; Delivery&quot;
            }
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Gas Delivery&quot;,
            &quot;slug&quot;: &quot;gas-delivery&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/gas-delivery.png&quot;,
            &quot;priority&quot;: 3,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 13,
            &quot;name&quot;: &quot;Nails &amp; Skincare&quot;,
            &quot;slug&quot;: &quot;nails-skincare&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/nails-skincare.png&quot;,
            &quot;priority&quot;: 3,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Personal Care &amp; Wellness&quot;
            }
        },
        {
            &quot;id&quot;: 17,
            &quot;name&quot;: &quot;Internet Setup&quot;,
            &quot;slug&quot;: &quot;internet-setup&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/internet-setup.png&quot;,
            &quot;priority&quot;: 3,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Tech Services&quot;
            }
        },
        {
            &quot;id&quot;: 22,
            &quot;name&quot;: &quot;Personal Drivers&quot;,
            &quot;slug&quot;: &quot;personal-drivers&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/personal-drivers.png&quot;,
            &quot;priority&quot;: 3,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Transport &amp; Delivery&quot;
            }
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Cleaning&quot;,
            &quot;slug&quot;: &quot;cleaning&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/cleaning.png&quot;,
            &quot;priority&quot;: 4,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 14,
            &quot;name&quot;: &quot;Massage&quot;,
            &quot;slug&quot;: &quot;massage&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/massage.png&quot;,
            &quot;priority&quot;: 4,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Personal Care &amp; Wellness&quot;
            }
        },
        {
            &quot;id&quot;: 18,
            &quot;name&quot;: &quot;Software Installations&quot;,
            &quot;slug&quot;: &quot;software-installations&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/software-installations.png&quot;,
            &quot;priority&quot;: 4,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Tech Services&quot;
            }
        },
        {
            &quot;id&quot;: 23,
            &quot;name&quot;: &quot;Grocery Delivery&quot;,
            &quot;slug&quot;: &quot;grocery-delivery&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/grocery-delivery.png&quot;,
            &quot;priority&quot;: 4,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Transport &amp; Delivery&quot;
            }
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Carpentry&quot;,
            &quot;slug&quot;: &quot;carpentry&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/carpentry.png&quot;,
            &quot;priority&quot;: 5,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 19,
            &quot;name&quot;: &quot;Network &amp; Systems&quot;,
            &quot;slug&quot;: &quot;network-systems&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/network-systems.png&quot;,
            &quot;priority&quot;: 5,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Tech Services&quot;
            }
        },
        {
            &quot;id&quot;: 24,
            &quot;name&quot;: &quot;Courier&quot;,
            &quot;slug&quot;: &quot;courier&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/courier.png&quot;,
            &quot;priority&quot;: 5,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Transport &amp; Delivery&quot;
            }
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;AC Repair&quot;,
            &quot;slug&quot;: &quot;ac-repair&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/ac-repair.png&quot;,
            &quot;priority&quot;: 6,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Painter&quot;,
            &quot;slug&quot;: &quot;painter&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/painter.png&quot;,
            &quot;priority&quot;: 7,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: &quot;Aluminum&quot;,
            &quot;slug&quot;: &quot;aluminum&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/aluminum.png&quot;,
            &quot;priority&quot;: 8,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: &quot;Tile Installation&quot;,
            &quot;slug&quot;: &quot;tile-installation&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/tile-installation.png&quot;,
            &quot;priority&quot;: 9,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: &quot;Curtain/TV Installation&quot;,
            &quot;slug&quot;: &quot;curtaintv-installation&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage//category_images/curtaintv-installation.png&quot;,
            &quot;priority&quot;: 10,
            &quot;is_active&quot;: true,
            &quot;category&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Maintenance &amp; Utilities&quot;
            }
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-subcategories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-subcategories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-subcategories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-subcategories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-subcategories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-subcategories" data-method="GET"
      data-path="api/subcategories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-subcategories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-subcategories"
                    onclick="tryItOut('GETapi-subcategories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-subcategories"
                    onclick="cancelTryOut('GETapi-subcategories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-subcategories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/subcategories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-subcategories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-subcategories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-subcategories"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-subcategories"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-providers">GET api/providers</h2>

<p>
</p>



<span id="example-requests-GETapi-providers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/providers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/providers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-providers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Data fetched successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Electricity&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Plumbing&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Gas Delivery&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Cleaning&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Carpentry&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;AC Repair&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Painter&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Aluminum&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 9,
                &quot;name&quot;: &quot;Tile Installation&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name&quot;: null,
            &quot;bio&quot;: null,
            &quot;phone&quot;: null,
            &quot;whatsapp&quot;: null,
            &quot;location&quot;: null,
            &quot;latitude&quot;: null,
            &quot;longitude&quot;: null,
            &quot;subcategory&quot;: {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Curtain/TV Installation&quot;
            },
            &quot;profile_image&quot;: null,
            &quot;work_images&quot;: [],
            &quot;portfolio_file&quot;: null,
            &quot;is_active&quot;: true,
            &quot;approval_status&quot;: &quot;approved&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-providers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-providers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-providers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-providers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-providers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-providers" data-method="GET"
      data-path="api/providers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-providers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-providers"
                    onclick="tryItOut('GETapi-providers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-providers"
                    onclick="cancelTryOut('GETapi-providers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-providers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/providers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-providers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-providers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-providers"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-providers"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-providers--provider_id-">GET api/providers/{provider_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-providers--provider_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/providers/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/providers/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-providers--provider_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Data fetched successfully.&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: null,
        &quot;bio&quot;: null,
        &quot;phone&quot;: null,
        &quot;whatsapp&quot;: null,
        &quot;location&quot;: null,
        &quot;latitude&quot;: null,
        &quot;longitude&quot;: null,
        &quot;subcategory&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Electricity&quot;
        },
        &quot;profile_image&quot;: null,
        &quot;work_images&quot;: [],
        &quot;portfolio_file&quot;: null,
        &quot;is_active&quot;: true,
        &quot;approval_status&quot;: &quot;approved&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-providers--provider_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-providers--provider_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-providers--provider_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-providers--provider_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-providers--provider_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-providers--provider_id-" data-method="GET"
      data-path="api/providers/{provider_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-providers--provider_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-providers--provider_id-"
                    onclick="tryItOut('GETapi-providers--provider_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-providers--provider_id-"
                    onclick="cancelTryOut('GETapi-providers--provider_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-providers--provider_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/providers/{provider_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-providers--provider_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-providers--provider_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-providers--provider_id-"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-providers--provider_id-"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>provider_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="provider_id"                data-endpoint="GETapi-providers--provider_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the provider. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-providers--provider_id--ratings">GET api/providers/{provider_id}/ratings</h2>

<p>
</p>



<span id="example-requests-GETapi-providers--provider_id--ratings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/providers/1/ratings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/providers/1/ratings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-providers--provider_id--ratings">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Data fetched successfully.&quot;,
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-providers--provider_id--ratings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-providers--provider_id--ratings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-providers--provider_id--ratings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-providers--provider_id--ratings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-providers--provider_id--ratings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-providers--provider_id--ratings" data-method="GET"
      data-path="api/providers/{provider_id}/ratings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-providers--provider_id--ratings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-providers--provider_id--ratings"
                    onclick="tryItOut('GETapi-providers--provider_id--ratings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-providers--provider_id--ratings"
                    onclick="cancelTryOut('GETapi-providers--provider_id--ratings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-providers--provider_id--ratings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/providers/{provider_id}/ratings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-providers--provider_id--ratings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-providers--provider_id--ratings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-providers--provider_id--ratings"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-providers--provider_id--ratings"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>provider_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="provider_id"                data-endpoint="GETapi-providers--provider_id--ratings"
               value="1"
               data-component="url">
    <br>
<p>The ID of the provider. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-auth-register">POST api/auth/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}" \
    --data "{
    \"name\": \"vmqeopfuudtdsufvyvddq\",
    \"email\": \"kunde.eloisa@example.com\",
    \"password\": \"4[*UyPJ\\\"}6\",
    \"role_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

let body = {
    "name": "vmqeopfuudtdsufvyvddq",
    "email": "kunde.eloisa@example.com",
    "password": "4[*UyPJ\"}6",
    "role_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
</span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="POSTapi-auth-register"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="POSTapi-auth-register"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-auth-register"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-register"
               value="kunde.eloisa@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>kunde.eloisa@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-register"
               value="4[*UyPJ"}6"
               data-component="body">
    <br>
<p>Must be at least 6 characters. Example: <code>4[*UyPJ"}6</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role_id"                data-endpoint="POSTapi-auth-register"
               value="consequatur"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the roles table. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-auth-login">POST api/auth/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}" \
    --data "{
    \"email\": \"qkunze@example.com\",
    \"password\": \"O[2UZ5ij-e\\/dl4m{o,\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

let body = {
    "email": "qkunze@example.com",
    "password": "O[2UZ5ij-e\/dl4m{o,"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
</span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="POSTapi-auth-login"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="POSTapi-auth-login"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-auth-login"
               value="qkunze@example.com"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>qkunze@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-auth-login"
               value="O[2UZ5ij-e/dl4m{o,"
               data-component="body">
    <br>
<p>Example: <code>O[2UZ5ij-e/dl4m{o,</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-auth-logout">POST api/auth/logout</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/auth/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-logout">
</span>
<span id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-auth-logout" data-method="POST"
      data-path="api/auth/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-logout"
                    onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-logout"
                    onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-auth-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="POSTapi-auth-logout"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="POSTapi-auth-logout"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-DELETEapi-auth-delete">DELETE api/auth/delete</h2>

<p>
</p>



<span id="example-requests-DELETEapi-auth-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/auth/delete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/auth/delete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-auth-delete">
</span>
<span id="execution-results-DELETEapi-auth-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-auth-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-auth-delete"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-auth-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-auth-delete">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-auth-delete" data-method="DELETE"
      data-path="api/auth/delete"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-auth-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-auth-delete"
                    onclick="tryItOut('DELETEapi-auth-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-auth-delete"
                    onclick="cancelTryOut('DELETEapi-auth-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-auth-delete"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/auth/delete</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-auth-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-auth-delete"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="DELETEapi-auth-delete"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="DELETEapi-auth-delete"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-providers">POST api/providers</h2>

<p>
</p>



<span id="example-requests-POSTapi-providers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/providers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/providers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-providers">
</span>
<span id="execution-results-POSTapi-providers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-providers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-providers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-providers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-providers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-providers" data-method="POST"
      data-path="api/providers"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-providers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-providers"
                    onclick="tryItOut('POSTapi-providers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-providers"
                    onclick="cancelTryOut('POSTapi-providers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-providers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/providers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-providers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-providers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="POSTapi-providers"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="POSTapi-providers"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-providers--provider_id-">PUT api/providers/{provider_id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-providers--provider_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/api/providers/1" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}" \
    --form "name=vmqeopfuudtdsufvyvddq"\
    --form "bio=consequatur"\
    --form "phone=mqeopfuudtdsufvyv"\
    --form "whatsapp=ddqamniihfqcoynla"\
    --form "city=zghdtqtqxbajwbpilpmuf"\
    --form "area=inllwloauydlsmsjuryvo"\
    --form "location=jcybzvrbyickznkygloig"\
    --form "latitude=11613.31890586"\
    --form "longitude=11613.31890586"\
    --form "profile_image=@C:\Users\Ali\AppData\Local\Temp\php98CD.tmp" \
    --form "work_images[]=@C:\Users\Ali\AppData\Local\Temp\php98FD.tmp" \
    --form "portfolio_file=@C:\Users\Ali\AppData\Local\Temp\php98FE.tmp" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/providers/1"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

const body = new FormData();
body.append('name', 'vmqeopfuudtdsufvyvddq');
body.append('bio', 'consequatur');
body.append('phone', 'mqeopfuudtdsufvyv');
body.append('whatsapp', 'ddqamniihfqcoynla');
body.append('city', 'zghdtqtqxbajwbpilpmuf');
body.append('area', 'inllwloauydlsmsjuryvo');
body.append('location', 'jcybzvrbyickznkygloig');
body.append('latitude', '11613.31890586');
body.append('longitude', '11613.31890586');
body.append('profile_image', document.querySelector('input[name="profile_image"]').files[0]);
body.append('work_images[]', document.querySelector('input[name="work_images[]"]').files[0]);
body.append('portfolio_file', document.querySelector('input[name="portfolio_file"]').files[0]);

fetch(url, {
    method: "PUT",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-providers--provider_id-">
</span>
<span id="execution-results-PUTapi-providers--provider_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-providers--provider_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-providers--provider_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-providers--provider_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-providers--provider_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-providers--provider_id-" data-method="PUT"
      data-path="api/providers/{provider_id}"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-providers--provider_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-providers--provider_id-"
                    onclick="tryItOut('PUTapi-providers--provider_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-providers--provider_id-"
                    onclick="cancelTryOut('PUTapi-providers--provider_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-providers--provider_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/providers/{provider_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-providers--provider_id-"
               value="multipart/form-data"
               data-component="header">
    <br>
<p>Example: <code>multipart/form-data</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-providers--provider_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="PUTapi-providers--provider_id-"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="PUTapi-providers--provider_id-"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>provider_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="provider_id"                data-endpoint="PUTapi-providers--provider_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the provider. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>subcategory_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="subcategory_id"                data-endpoint="PUTapi-providers--provider_id-"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the subcategories table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTapi-providers--provider_id-"
               value="vmqeopfuudtdsufvyvddq"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>vmqeopfuudtdsufvyvddq</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>bio</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="bio"                data-endpoint="PUTapi-providers--provider_id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="phone"                data-endpoint="PUTapi-providers--provider_id-"
               value="mqeopfuudtdsufvyv"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>mqeopfuudtdsufvyv</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>whatsapp</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="whatsapp"                data-endpoint="PUTapi-providers--provider_id-"
               value="ddqamniihfqcoynla"
               data-component="body">
    <br>
<p>Must not be greater than 20 characters. Example: <code>ddqamniihfqcoynla</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>city</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="city"                data-endpoint="PUTapi-providers--provider_id-"
               value="zghdtqtqxbajwbpilpmuf"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>zghdtqtqxbajwbpilpmuf</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>area</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="area"                data-endpoint="PUTapi-providers--provider_id-"
               value="inllwloauydlsmsjuryvo"
               data-component="body">
    <br>
<p>Must not be greater than 100 characters. Example: <code>inllwloauydlsmsjuryvo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>location</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="location"                data-endpoint="PUTapi-providers--provider_id-"
               value="jcybzvrbyickznkygloig"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>jcybzvrbyickznkygloig</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="latitude"                data-endpoint="PUTapi-providers--provider_id-"
               value="11613.31890586"
               data-component="body">
    <br>
<p>Example: <code>11613.31890586</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="longitude"                data-endpoint="PUTapi-providers--provider_id-"
               value="11613.31890586"
               data-component="body">
    <br>
<p>Example: <code>11613.31890586</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>profile_image</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="profile_image"                data-endpoint="PUTapi-providers--provider_id-"
               value=""
               data-component="body">
    <br>
<p>Must be an image. Example: <code>C:\Users\Ali\AppData\Local\Temp\php98CD.tmp</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>work_images</code></b>&nbsp;&nbsp;
<small>file[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="work_images[0]"                data-endpoint="PUTapi-providers--provider_id-"
               data-component="body">
        <input type="file" style="display: none"
               name="work_images[1]"                data-endpoint="PUTapi-providers--provider_id-"
               data-component="body">
    <br>
<p>Must be an image.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>portfolio_file</code></b>&nbsp;&nbsp;
<small>file</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="file" style="display: none"
                              name="portfolio_file"                data-endpoint="PUTapi-providers--provider_id-"
               value=""
               data-component="body">
    <br>
<p>Must be a file. Example: <code>C:\Users\Ali\AppData\Local\Temp\php98FE.tmp</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-providers-me">GET api/providers/me</h2>

<p>
</p>



<span id="example-requests-GETapi-providers-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/providers/me" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/providers/me"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-providers-me">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Provider] me&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-providers-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-providers-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-providers-me"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-providers-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-providers-me">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-providers-me" data-method="GET"
      data-path="api/providers/me"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-providers-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-providers-me"
                    onclick="tryItOut('GETapi-providers-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-providers-me"
                    onclick="cancelTryOut('GETapi-providers-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-providers-me"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/providers/me</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-providers-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-providers-me"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-providers-me"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-providers-me"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-providers-me-stats">GET api/providers/me/stats</h2>

<p>
</p>



<span id="example-requests-GETapi-providers-me-stats">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/providers/me/stats" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/providers/me/stats"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-providers-me-stats">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-providers-me-stats" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-providers-me-stats"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-providers-me-stats"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-providers-me-stats" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-providers-me-stats">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-providers-me-stats" data-method="GET"
      data-path="api/providers/me/stats"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-providers-me-stats', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-providers-me-stats"
                    onclick="tryItOut('GETapi-providers-me-stats');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-providers-me-stats"
                    onclick="cancelTryOut('GETapi-providers-me-stats');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-providers-me-stats"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/providers/me/stats</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-providers-me-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-providers-me-stats"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-providers-me-stats"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-providers-me-stats"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-cities">GET api/cities</h2>

<p>
</p>



<span id="example-requests-GETapi-cities">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/cities" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cities"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cities">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Cities fetched successfully.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 3,
            &quot;name_en&quot;: &quot;Aley&quot;,
            &quot;name_ar&quot;: &quot;عاليه&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name_en&quot;: &quot;Baabda&quot;,
            &quot;name_ar&quot;: &quot;بعبدا&quot;
        },
        {
            &quot;id&quot;: 36,
            &quot;name_en&quot;: &quot;Baalbek&quot;,
            &quot;name_ar&quot;: &quot;بعلبك&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;name_en&quot;: &quot;Batroun&quot;,
            &quot;name_ar&quot;: &quot;البترون&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;name_en&quot;: &quot;Bcharre&quot;,
            &quot;name_ar&quot;: &quot;بشري&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;name_en&quot;: &quot;Bebnine&quot;,
            &quot;name_ar&quot;: &quot;ببنين&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;name_en&quot;: &quot;Beirut&quot;,
            &quot;name_ar&quot;: &quot;بيروت&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;name_en&quot;: &quot;Beit Mery&quot;,
            &quot;name_ar&quot;: &quot;بيت مري&quot;
        },
        {
            &quot;id&quot;: 39,
            &quot;name_en&quot;: &quot;Beqaa Gharbi&quot;,
            &quot;name_ar&quot;: &quot;البقاع الغربي&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;name_en&quot;: &quot;Bikfaya&quot;,
            &quot;name_ar&quot;: &quot;بكفيا&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;name_en&quot;: &quot;Bint Jbeil&quot;,
            &quot;name_ar&quot;: &quot;بنت جبيل&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;name_en&quot;: &quot;Broummana&quot;,
            &quot;name_ar&quot;: &quot;برمانا&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name_en&quot;: &quot;Choueifat&quot;,
            &quot;name_ar&quot;: &quot;الشويفات&quot;
        },
        {
            &quot;id&quot;: 32,
            &quot;name_en&quot;: &quot;Chtaura&quot;,
            &quot;name_ar&quot;: &quot;شتورا&quot;
        },
        {
            &quot;id&quot;: 40,
            &quot;name_en&quot;: &quot;Dahieh&quot;,
            &quot;name_ar&quot;: &quot;الضاحية الجنوبية&quot;
        },
        {
            &quot;id&quot;: 17,
            &quot;name_en&quot;: &quot;Danniyeh (Syr Dinniyeh)&quot;,
            &quot;name_ar&quot;: &quot;الضنية&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name_en&quot;: &quot;Dbayeh&quot;,
            &quot;name_ar&quot;: &quot;ضبية&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;name_en&quot;: &quot;Halba&quot;,
            &quot;name_ar&quot;: &quot;حلبا&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;name_en&quot;: &quot;Hasbaya&quot;,
            &quot;name_ar&quot;: &quot;حاصبيا&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;name_en&quot;: &quot;Hazmieh&quot;,
            &quot;name_ar&quot;: &quot;الحازمية&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;name_en&quot;: &quot;Hermel&quot;,
            &quot;name_ar&quot;: &quot;الهرمل&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;name_en&quot;: &quot;Jezzine&quot;,
            &quot;name_ar&quot;: &quot;جزين&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name_en&quot;: &quot;Jounieh&quot;,
            &quot;name_ar&quot;: &quot;جونية&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;name_en&quot;: &quot;Kfar Kila&quot;,
            &quot;name_ar&quot;: &quot;كفركلا&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;name_en&quot;: &quot;Koura (Amioun)&quot;,
            &quot;name_ar&quot;: &quot;الكورة &ndash; أميون&quot;
        },
        {
            &quot;id&quot;: 27,
            &quot;name_en&quot;: &quot;Marjayoun&quot;,
            &quot;name_ar&quot;: &quot;مرجعيون&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;name_en&quot;: &quot;Matn&quot;,
            &quot;name_ar&quot;: &quot;المتن&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;name_en&quot;: &quot;Minieh&quot;,
            &quot;name_ar&quot;: &quot;المنية&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;name_en&quot;: &quot;Nabatieh&quot;,
            &quot;name_ar&quot;: &quot;النبطية&quot;
        },
        {
            &quot;id&quot;: 38,
            &quot;name_en&quot;: &quot;Qaa&quot;,
            &quot;name_ar&quot;: &quot;القاع&quot;
        },
        {
            &quot;id&quot;: 34,
            &quot;name_en&quot;: &quot;Qabb Elias&quot;,
            &quot;name_ar&quot;: &quot;قب الياس&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;name_en&quot;: &quot;Riyaq&quot;,
            &quot;name_ar&quot;: &quot;رياق&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;name_en&quot;: &quot;Sarafand&quot;,
            &quot;name_ar&quot;: &quot;الصرفند&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;name_en&quot;: &quot;Sidon (Saida)&quot;,
            &quot;name_ar&quot;: &quot;صيدا&quot;
        },
        {
            &quot;id&quot;: 33,
            &quot;name_en&quot;: &quot;Taanayel&quot;,
            &quot;name_ar&quot;: &quot;تعنايل&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;name_en&quot;: &quot;Tripoli&quot;,
            &quot;name_ar&quot;: &quot;طرابلس&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;name_en&quot;: &quot;Tyre (Sour)&quot;,
            &quot;name_ar&quot;: &quot;صور&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;name_en&quot;: &quot;Zahle&quot;,
            &quot;name_ar&quot;: &quot;زحلة&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;name_en&quot;: &quot;Zgharta&quot;,
            &quot;name_ar&quot;: &quot;زغرتا&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name_en&quot;: &quot;Zouk Mosbeh&quot;,
            &quot;name_ar&quot;: &quot;ذوق مصبح&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cities" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cities"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cities"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cities">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cities" data-method="GET"
      data-path="api/cities"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cities', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cities"
                    onclick="tryItOut('GETapi-cities');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cities"
                    onclick="cancelTryOut('GETapi-cities');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cities"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cities</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cities"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-cities"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-cities"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-cities--city_id--areas">GET api/cities/{city_id}/areas</h2>

<p>
</p>



<span id="example-requests-GETapi-cities--city_id--areas">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/cities/1/areas" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cities/1/areas"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-cities--city_id--areas">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;Success&quot;,
    &quot;message&quot;: &quot;Areas for this city fetched.&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 17,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Achrafieh&quot;,
            &quot;name_ar&quot;: &quot;الأشرفية&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Ain El Mreisseh&quot;,
            &quot;name_ar&quot;: &quot;عين المريسة&quot;
        },
        {
            &quot;id&quot;: 36,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Ain El Remmaneh&quot;,
            &quot;name_ar&quot;: &quot;عين الرمانة&quot;
        },
        {
            &quot;id&quot;: 61,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Airport Highway&quot;,
            &quot;name_ar&quot;: &quot;أوتوستراد المطار&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Baabda&quot;,
            &quot;name_ar&quot;: &quot;بعبدا&quot;
        },
        {
            &quot;id&quot;: 37,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Badaro&quot;,
            &quot;name_ar&quot;: &quot;بدارو&quot;
        },
        {
            &quot;id&quot;: 58,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Barbir&quot;,
            &quot;name_ar&quot;: &quot;الباربير&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Basta&quot;,
            &quot;name_ar&quot;: &quot;البسطة&quot;
        },
        {
            &quot;id&quot;: 45,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Bechara El Khoury&quot;,
            &quot;name_ar&quot;: &quot;بشارة الخوري&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Bir Abed&quot;,
            &quot;name_ar&quot;: &quot;بير العبد&quot;
        },
        {
            &quot;id&quot;: 42,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Bourj El Barajneh&quot;,
            &quot;name_ar&quot;: &quot;برج البراجنة&quot;
        },
        {
            &quot;id&quot;: 41,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Bourj Hammoud&quot;,
            &quot;name_ar&quot;: &quot;برج حمود&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Burj Abi Haidar&quot;,
            &quot;name_ar&quot;: &quot;برج أبي حيدر&quot;
        },
        {
            &quot;id&quot;: 46,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Charles Helou&quot;,
            &quot;name_ar&quot;: &quot;شارل الحلو&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Chiyah&quot;,
            &quot;name_ar&quot;: &quot;الشياح&quot;
        },
        {
            &quot;id&quot;: 49,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Clemenceau&quot;,
            &quot;name_ar&quot;: &quot;كليمنصو&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Dahieh&quot;,
            &quot;name_ar&quot;: &quot;الضاحية&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Dekwaneh&quot;,
            &quot;name_ar&quot;: &quot;الدكوانة&quot;
        },
        {
            &quot;id&quot;: 50,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Downtown Beirut&quot;,
            &quot;name_ar&quot;: &quot;وسط بيروت&quot;
        },
        {
            &quot;id&quot;: 57,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;El Cola&quot;,
            &quot;name_ar&quot;: &quot;الكولا&quot;
        },
        {
            &quot;id&quot;: 54,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Fakhr El-Din Street&quot;,
            &quot;name_ar&quot;: &quot;شارع فخر الدين&quot;
        },
        {
            &quot;id&quot;: 25,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Furn El Chebbak&quot;,
            &quot;name_ar&quot;: &quot;فرن الشباك&quot;
        },
        {
            &quot;id&quot;: 38,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Furn El Hayek&quot;,
            &quot;name_ar&quot;: &quot;فرن الحايك&quot;
        },
        {
            &quot;id&quot;: 16,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Gemmayzeh&quot;,
            &quot;name_ar&quot;: &quot;الجميزة&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Hamra&quot;,
            &quot;name_ar&quot;: &quot;الحمرا&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Haret Hreik&quot;,
            &quot;name_ar&quot;: &quot;حارة حريك&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Hazmieh&quot;,
            &quot;name_ar&quot;: &quot;الحازمية&quot;
        },
        {
            &quot;id&quot;: 63,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Hazmieh New&quot;,
            &quot;name_ar&quot;: &quot;الحازمية الجديدة&quot;
        },
        {
            &quot;id&quot;: 55,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Horch Beirut&quot;,
            &quot;name_ar&quot;: &quot;حرش بيروت&quot;
        },
        {
            &quot;id&quot;: 39,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Horch Tabet&quot;,
            &quot;name_ar&quot;: &quot;حرش تابت&quot;
        },
        {
            &quot;id&quot;: 47,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Jeitaoui&quot;,
            &quot;name_ar&quot;: &quot;الجعيتاوي&quot;
        },
        {
            &quot;id&quot;: 62,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Jisr El Basha&quot;,
            &quot;name_ar&quot;: &quot;جسر الباشا&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Jnah&quot;,
            &quot;name_ar&quot;: &quot;الجناح&quot;
        },
        {
            &quot;id&quot;: 34,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Karantina&quot;,
            &quot;name_ar&quot;: &quot;الكرنتينا&quot;
        },
        {
            &quot;id&quot;: 23,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Kaskas&quot;,
            &quot;name_ar&quot;: &quot;كركاس&quot;
        },
        {
            &quot;id&quot;: 27,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Khalde&quot;,
            &quot;name_ar&quot;: &quot;خلدة&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Manara&quot;,
            &quot;name_ar&quot;: &quot;المنارة&quot;
        },
        {
            &quot;id&quot;: 22,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Mar Elias&quot;,
            &quot;name_ar&quot;: &quot;مار إلياس&quot;
        },
        {
            &quot;id&quot;: 40,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Mar Mikhael&quot;,
            &quot;name_ar&quot;: &quot;مار مخايل&quot;
        },
        {
            &quot;id&quot;: 19,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Mathaf&quot;,
            &quot;name_ar&quot;: &quot;المتحف&quot;
        },
        {
            &quot;id&quot;: 53,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Mathaf National Museum&quot;,
            &quot;name_ar&quot;: &quot;متحف بيروت الوطني&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Mazraa&quot;,
            &quot;name_ar&quot;: &quot;المزرعة&quot;
        },
        {
            &quot;id&quot;: 48,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Monot&quot;,
            &quot;name_ar&quot;: &quot;مونوت&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Ouzai&quot;,
            &quot;name_ar&quot;: &quot;الأوزاعي&quot;
        },
        {
            &quot;id&quot;: 20,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Qasqas&quot;,
            &quot;name_ar&quot;: &quot;قصقص&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Raouche&quot;,
            &quot;name_ar&quot;: &quot;الروشة&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Ras Beirut&quot;,
            &quot;name_ar&quot;: &quot;رأس بيروت&quot;
        },
        {
            &quot;id&quot;: 60,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Rihaniyeh&quot;,
            &quot;name_ar&quot;: &quot;الريحانية&quot;
        },
        {
            &quot;id&quot;: 32,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Sabra&quot;,
            &quot;name_ar&quot;: &quot;صبرا&quot;
        },
        {
            &quot;id&quot;: 51,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Saifi Village&quot;,
            &quot;name_ar&quot;: &quot;قرية الصيفي&quot;
        },
        {
            &quot;id&quot;: 44,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Salim Slam&quot;,
            &quot;name_ar&quot;: &quot;سليم سلام&quot;
        },
        {
            &quot;id&quot;: 56,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Sassine Square&quot;,
            &quot;name_ar&quot;: &quot;ساحة ساسين&quot;
        },
        {
            &quot;id&quot;: 64,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Sfeir&quot;,
            &quot;name_ar&quot;: &quot;صفير&quot;
        },
        {
            &quot;id&quot;: 65,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Shiyah South&quot;,
            &quot;name_ar&quot;: &quot;الشياح الجنوبي&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Sin El Fil&quot;,
            &quot;name_ar&quot;: &quot;سن الفيل&quot;
        },
        {
            &quot;id&quot;: 24,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Siyyad&quot;,
            &quot;name_ar&quot;: &quot;الصياد&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Sodeco&quot;,
            &quot;name_ar&quot;: &quot;سوديكو&quot;
        },
        {
            &quot;id&quot;: 52,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Sodeco Square&quot;,
            &quot;name_ar&quot;: &quot;ساحة السوديكو&quot;
        },
        {
            &quot;id&quot;: 18,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Tabaris&quot;,
            &quot;name_ar&quot;: &quot;تباريز&quot;
        },
        {
            &quot;id&quot;: 43,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Talet El Khayat&quot;,
            &quot;name_ar&quot;: &quot;تلة الخياط&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Tariq El Jdideh&quot;,
            &quot;name_ar&quot;: &quot;طريق الجديدة&quot;
        },
        {
            &quot;id&quot;: 33,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Tariq El Matar&quot;,
            &quot;name_ar&quot;: &quot;طريق المطار&quot;
        },
        {
            &quot;id&quot;: 59,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Tayouneh&quot;,
            &quot;name_ar&quot;: &quot;الطّيونة&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Verdun&quot;,
            &quot;name_ar&quot;: &quot;فردان&quot;
        },
        {
            &quot;id&quot;: 21,
            &quot;city_id&quot;: 1,
            &quot;name_en&quot;: &quot;Zokak El Blatt&quot;,
            &quot;name_ar&quot;: &quot;زقاق البلاط&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cities--city_id--areas" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cities--city_id--areas"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cities--city_id--areas"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-cities--city_id--areas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cities--city_id--areas">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-cities--city_id--areas" data-method="GET"
      data-path="api/cities/{city_id}/areas"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cities--city_id--areas', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cities--city_id--areas"
                    onclick="tryItOut('GETapi-cities--city_id--areas');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cities--city_id--areas"
                    onclick="cancelTryOut('GETapi-cities--city_id--areas');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cities--city_id--areas"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cities/{city_id}/areas</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-cities--city_id--areas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-cities--city_id--areas"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-cities--city_id--areas"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-cities--city_id--areas"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>city_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="city_id"                data-endpoint="GETapi-cities--city_id--areas"
               value="1"
               data-component="url">
    <br>
<p>The ID of the city. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-favorites">GET api/favorites</h2>

<p>
</p>



<span id="example-requests-GETapi-favorites">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/favorites" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/favorites"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-favorites">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-favorites" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-favorites"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-favorites"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-favorites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-favorites">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-favorites" data-method="GET"
      data-path="api/favorites"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-favorites', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-favorites"
                    onclick="tryItOut('GETapi-favorites');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-favorites"
                    onclick="cancelTryOut('GETapi-favorites');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-favorites"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/favorites</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-favorites"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-favorites"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="GETapi-favorites"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="GETapi-favorites"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-favorites--provider_id-">POST api/favorites/{provider_id}</h2>

<p>
</p>



<span id="example-requests-POSTapi-favorites--provider_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/favorites/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "SERVIO_KEY: 123456" \
    --header "Accept-Language: {locale}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/favorites/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "SERVIO_KEY": "123456",
    "Accept-Language": "{locale}",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-favorites--provider_id-">
</span>
<span id="execution-results-POSTapi-favorites--provider_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-favorites--provider_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-favorites--provider_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-favorites--provider_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-favorites--provider_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-favorites--provider_id-" data-method="POST"
      data-path="api/favorites/{provider_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-favorites--provider_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-favorites--provider_id-"
                    onclick="tryItOut('POSTapi-favorites--provider_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-favorites--provider_id-"
                    onclick="cancelTryOut('POSTapi-favorites--provider_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-favorites--provider_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/favorites/{provider_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-favorites--provider_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-favorites--provider_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>SERVIO_KEY</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="SERVIO_KEY"                data-endpoint="POSTapi-favorites--provider_id-"
               value="123456"
               data-component="header">
    <br>
<p>Example: <code>123456</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept-Language</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept-Language"                data-endpoint="POSTapi-favorites--provider_id-"
               value="{locale}"
               data-component="header">
    <br>
<p>Example: <code>{locale}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>provider_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="provider_id"                data-endpoint="POSTapi-favorites--provider_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the provider. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
