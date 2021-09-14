<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI (Swagger) spec</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: September 14 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
<script>
    var baseUrl = "http://localhost";
</script>
<script src="{{ asset("vendor/scribe/js/tryitout-2.7.10.js") }}"></script>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost</code></pre><h1>Authenticating requests</h1>
<p>This API is not authenticated.</p><h1>CMS Management</h1>
<p>APIs for managing basic cms functionality</p>
<h2>CMS Homepage</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/get-homepage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "data": {
        "id": 1,
        "cms_id": 1,
        "banner_heading": "Home page heading",
        "banner_sub_heading": "Home page sub heading",
        "banner_description": "&lt;p&gt;Home page Description&amp;nbsp;&lt;\/p&gt;\n",
        "banner_image": "cms_images\/436c35208ced04ea9dec31bd037036fc.png",
        "created_at": "2021-08-18T10:15:38.000000Z",
        "updated_at": "2021-08-19T11:02:44.000000Z"
    }
}</code></pre>
<div id="execution-results-GETapi-get-homepage" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-get-homepage"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-homepage"></code></pre>
</div>
<div id="execution-error-GETapi-get-homepage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-homepage"></code></pre>
</div>
<form id="form-GETapi-get-homepage" data-method="GET" data-path="api/get-homepage" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-get-homepage', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-get-homepage" onclick="tryItOut('GETapi-get-homepage');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-get-homepage" onclick="cancelTryOut('GETapi-get-homepage');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-get-homepage" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/get-homepage</code></b>
</p>
</form><h1>Invitation Management</h1>
<p>APIs for managing  invitation functionality</p>
<h2>api/invites</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/invites"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "data": [
        {
            "id": 1,
            "inviter_id": 1,
            "invited_id": 4,
            "active": 1,
            "created_at": "2021-08-20T09:42:10.000000Z",
            "updated_at": "2021-08-20T09:42:10.000000Z",
            "deleted_at": null,
            "usersinvitation": {
                "id": 1,
                "first_name": "Admin",
                "last_name": "Admin",
                "email": "admin@admin.com",
                "phone": null,
                "address": null,
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "active": 1,
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "full_name": "Admin Admin",
                "role_name": "SUPER-ADMIN",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Admin&amp;color=7F9CF5&amp;background=EBF4FF"
            },
            "usersinvited": {
                "id": 4,
                "first_name": "Lelah",
                "last_name": "Wuckert",
                "email": "wyman01@example.com",
                "phone": "+16808068368",
                "address": null,
                "email_verified_at": "2021-08-18T10:15:30.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "active": 0,
                "created_at": "2021-08-18T10:15:33.000000Z",
                "updated_at": "2021-08-18T10:15:33.000000Z",
                "full_name": "Lelah Wuckert",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Lelah&amp;color=7F9CF5&amp;background=EBF4FF"
            }
        },
        {
            "id": 2,
            "inviter_id": 1,
            "invited_id": 10,
            "active": 1,
            "created_at": "2021-08-20T09:46:56.000000Z",
            "updated_at": "2021-08-20T09:46:56.000000Z",
            "deleted_at": null,
            "usersinvitation": {
                "id": 1,
                "first_name": "Admin",
                "last_name": "Admin",
                "email": "admin@admin.com",
                "phone": null,
                "address": null,
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "active": 1,
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "full_name": "Admin Admin",
                "role_name": "SUPER-ADMIN",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Admin&amp;color=7F9CF5&amp;background=EBF4FF"
            },
            "usersinvited": {
                "id": 10,
                "first_name": "Terence",
                "last_name": "Gislason",
                "email": "karen75@example.com",
                "phone": "(575) 795-3129",
                "address": null,
                "email_verified_at": "2021-08-18T10:15:30.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "active": 0,
                "created_at": "2021-08-18T10:15:34.000000Z",
                "updated_at": "2021-08-18T10:15:34.000000Z",
                "full_name": "Terence Gislason",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Terence&amp;color=7F9CF5&amp;background=EBF4FF"
            }
        }
    ]
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-invites" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-invites"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-invites"></code></pre>
</div>
<div id="execution-error-GETapi-invites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-invites"></code></pre>
</div>
<form id="form-GETapi-invites" data-method="GET" data-path="api/invites" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-invites', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-invites" onclick="tryItOut('GETapi-invites');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-invites" onclick="cancelTryOut('GETapi-invites');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-invites" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/invites</code></b>
</p>
<p>
<label id="auth-GETapi-invites" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-invites" data-component="header"></label>
</p>
</form>
<h2>api/invites</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/invites"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "invited_id": "5"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! invitation created",
    "data": {
        "invited_id": "5",
        "inviter_id": 1,
        "updated_at": "2021-08-20T10:00:26.000000Z",
        "created_at": "2021-08-20T10:00:26.000000Z",
        "id": 3
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-invites" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-invites"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-invites"></code></pre>
</div>
<div id="execution-error-POSTapi-invites" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-invites"></code></pre>
</div>
<form id="form-POSTapi-invites" data-method="POST" data-path="api/invites" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-invites', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-invites" onclick="tryItOut('POSTapi-invites');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-invites" onclick="cancelTryOut('POSTapi-invites');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-invites" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/invites</code></b>
</p>
<p>
<label id="auth-POSTapi-invites" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-invites" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>invited_id</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="invited_id" data-endpoint="POSTapi-invites" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/invites/{invite}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/invites/voluptatem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "data": []
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-invites--invite-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-invites--invite-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-invites--invite-"></code></pre>
</div>
<div id="execution-error-GETapi-invites--invite-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-invites--invite-"></code></pre>
</div>
<form id="form-GETapi-invites--invite-" data-method="GET" data-path="api/invites/{invite}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-invites--invite-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-invites--invite-" onclick="tryItOut('GETapi-invites--invite-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-invites--invite-" onclick="cancelTryOut('GETapi-invites--invite-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-invites--invite-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/invites/{invite}</code></b>
</p>
<p>
<label id="auth-GETapi-invites--invite-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-invites--invite-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>invite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="invite" data-endpoint="GETapi-invites--invite-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>invited</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="invited" data-endpoint="GETapi-invites--invite-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/invites/{invite}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/invites/repellendus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! task updated",
    "data": []
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PUTapi-invites--invite-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-invites--invite-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-invites--invite-"></code></pre>
</div>
<div id="execution-error-PUTapi-invites--invite-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-invites--invite-"></code></pre>
</div>
<form id="form-PUTapi-invites--invite-" data-method="PUT" data-path="api/invites/{invite}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-invites--invite-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-invites--invite-" onclick="tryItOut('PUTapi-invites--invite-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-invites--invite-" onclick="cancelTryOut('PUTapi-invites--invite-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-invites--invite-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/invites/{invite}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/invites/{invite}</code></b>
</p>
<p>
<label id="auth-PUTapi-invites--invite-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-invites--invite-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>invite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="invite" data-endpoint="PUTapi-invites--invite-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>invited_id</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="invited_id" data-endpoint="PUTapi-invites--invite-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/invites/{invite}</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/invites/vitae"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! Invitation deleted"
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-DELETEapi-invites--invite-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-invites--invite-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-invites--invite-"></code></pre>
</div>
<div id="execution-error-DELETEapi-invites--invite-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-invites--invite-"></code></pre>
</div>
<form id="form-DELETEapi-invites--invite-" data-method="DELETE" data-path="api/invites/{invite}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-invites--invite-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-invites--invite-" onclick="tryItOut('DELETEapi-invites--invite-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-invites--invite-" onclick="cancelTryOut('DELETEapi-invites--invite-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-invites--invite-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/invites/{invite}</code></b>
</p>
<p>
<label id="auth-DELETEapi-invites--invite-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-invites--invite-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>invite</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="invite" data-endpoint="DELETEapi-invites--invite-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>invitation</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="invitation" data-endpoint="DELETEapi-invites--invite-" data-component="url" required  hidden>
<br>

</p>
</form><h1>User Authentication</h1>
<p>APIs for managing basic auth functionality</p>
<h2>Register</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "full_name": "John",
    "email": "John@gmail.com",
    "user_name": "John",
    "phone": "1122334455",
    "address": "address",
    "Profile": "test",
    "profession_id": "1",
    "industry_id": "password"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! registration completed",
    "token": "6|V3krGzwc7vOLxIK8MUyi3NmKXcEaJk2GqB7QDBGG",
    "data": {
        "first_name": "test",
        "last_name": "test",
        "user_name": "test",
        "email": "test@test.com",
        "phone": "123456789",
        "profession_id": "1",
        "industry_id": "1",
        "address": "address test",
        "message": "looking for Artist",
        "profile_photo_path": "1629438076.png",
        "updated_at": "2021-08-19T05:07:36.000000Z",
        "created_at": "2021-08-19T05:07:36.000000Z",
        "id": 54,
        "full_name": "test test",
        "role_name": "CLIENT",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=test&amp;color=7F9CF5&amp;background=EBF4FF",
        "roles": [
            {
                "id": 2,
                "name": "CLIENT",
                "guard_name": "web",
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "pivot": {
                    "model_id": 54,
                    "role_id": 2,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}</code></pre>
<div id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</div>
<div id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</div>
<form id="form-POSTapi-register" data-method="POST" data-path="api/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-register" onclick="tryItOut('POSTapi-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-register" onclick="cancelTryOut('POSTapi-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>full_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="full_name" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>user_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user_name" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-register" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>Profile</code></b>&nbsp;&nbsp;<small>Photo</small>     <i>optional</i> &nbsp;
<input type="text" name="Profile" data-endpoint="POSTapi-register" data-component="body"  hidden>
<br>
string required  Example: image
 @bodyParam  looking for string required
</p>
<p>
<b><code>profession_id</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="profession_id" data-endpoint="POSTapi-register" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>industry_id</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="industry_id" data-endpoint="POSTapi-register" data-component="body"  hidden>
<br>
Example: 1
* @bodyParam  password password required
</p>

</form>
<h2>api/login</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "user@user.com or user",
    "password": "12345678",
    "device_type": "device type",
    "device_token": "device token"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "token": "3|VKeacEjkrbok1aDKxqTa1eIgEXgoi8rPPWRFpTJr",
    "data": {
        "id": 1,
        "first_name": "Admin",
        "last_name": "Admin",
        "user_name": "Admin1",
        "email": "admin@admin.com",
        "phone": null,
        "address": null,
        "looking_for": null,
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "otp": null,
        "social_id": null,
        "social_account_type": null,
        "social_info": null,
        "device_type": "1",
        "device_token": "1",
        "industry_id": null,
        "profession_id": null,
        "active": 1,
        "created_at": "2021-08-30T05:05:39.000000Z",
        "updated_at": "2021-08-30T06:58:57.000000Z",
        "full_name": "Admin Admin",
        "role_name": "SUPER-ADMIN",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Admin&amp;color=7F9CF5&amp;background=EBF4FF"
    }
}</code></pre>
<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST" data-path="api/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-login" onclick="tryItOut('POSTapi-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-login" onclick="cancelTryOut('POSTapi-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>device_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="device_type" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>device_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="device_token" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>Social signup</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/social-login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "email": "John@gmail.com",
    "social_id": "1122334455",
    "social_account_type": "social_account_type",
    "device_type": "device type",
    "device_token": "device token",
    "password": "password",
    "password_confirmation": "password"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "token": "2|TskImAyBQSIUR58AS5sGMUvyEIHe8nUiHTteVV4h",
    "message": "Success! registration completed",
    "data": {
        "first_name": "ranit",
        "last_name": "ray",
        "email": "ranit@rc.com",
        "updated_at": "2021-08-19T05:55:18.000000Z",
        "created_at": "2021-08-19T05:55:18.000000Z",
        "id": 55,
        "full_name": "ranit ray",
        "role_name": "CLIENT",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=tghfh&amp;color=7F9CF5&amp;background=EBF4FF",
        "roles": [
            {
                "id": 2,
                "name": "CLIENT",
                "guard_name": "web",
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "pivot": {
                    "model_id": 55,
                    "role_id": 2,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}</code></pre>
<div id="execution-results-POSTapi-social-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-social-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-social-login"></code></pre>
</div>
<div id="execution-error-POSTapi-social-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-social-login"></code></pre>
</div>
<form id="form-POSTapi-social-login" data-method="POST" data-path="api/social-login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-social-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-social-login" onclick="tryItOut('POSTapi-social-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-social-login" onclick="cancelTryOut('POSTapi-social-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-social-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/social-login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>social_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="social_id" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>social_account_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="social_account_type" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>device_type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="device_type" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>device_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="device_token" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password_confirmation" data-endpoint="POSTapi-social-login" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>Otp Verification</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/otp-verification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "lueilwitz.caterina@example.com",
    "otp": 1234
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! Otp Send successfully",
    "data": {
        "id": 3,
        "first_name": "Makayla",
        "last_name": "Runte",
        "email": "cedrick.schmitt@example.com",
        "phone": "609.587.7230",
        "email_verified_at": "2021-03-11T07:39:50.000000Z",
        "otp": 2430,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-11T07:39:54.000000Z",
        "updated_at": "2021-03-12T06:36:42.000000Z",
        "full_name": "Makayla Runte",
        "role_name": "CLIENT",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Makayla&amp;color=7F9CF5&amp;background=EBF4FF"
    }
}</code></pre>
<div id="execution-results-POSTapi-otp-verification" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-otp-verification"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-otp-verification"></code></pre>
</div>
<div id="execution-error-POSTapi-otp-verification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-otp-verification"></code></pre>
</div>
<form id="form-POSTapi-otp-verification" data-method="POST" data-path="api/otp-verification" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-otp-verification', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-otp-verification" onclick="tryItOut('POSTapi-otp-verification');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-otp-verification" onclick="cancelTryOut('POSTapi-otp-verification');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-otp-verification" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/otp-verification</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-otp-verification" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>otp</code></b>&nbsp;&nbsp;<small>number</small>     <i>optional</i> &nbsp;
<input type="number" name="otp" data-endpoint="POSTapi-otp-verification" data-component="body"  hidden>
<br>

</p>

</form>
<h2>Forgot password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/forgot-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "lueilwitz.caterina@example.com",
    "password": "danwdjdajw"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! password change successfully",
    "data": {
        "id": 2,
        "first_name": "Emory",
        "last_name": "Wiza",
        "email": "lueilwitz.caterina@example.com",
        "phone": "(345) 744-1545",
        "email_verified_at": "2021-03-05T06:49:30.000000Z",
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-05T06:49:37.000000Z",
        "updated_at": "2021-03-08T07:50:35.000000Z",
        "full_name": "Emory Wiza",
        "role_name": "CLIENT",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Emory&amp;color=7F9CF5&amp;background=EBF4FF"
    }
}</code></pre>
<div id="execution-results-POSTapi-forgot-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-forgot-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-forgot-password"></code></pre>
</div>
<div id="execution-error-POSTapi-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-forgot-password"></code></pre>
</div>
<form id="form-POSTapi-forgot-password" data-method="POST" data-path="api/forgot-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-forgot-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-forgot-password" onclick="tryItOut('POSTapi-forgot-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-forgot-password" onclick="cancelTryOut('POSTapi-forgot-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-forgot-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/forgot-password</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-forgot-password" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-forgot-password" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>Get-Industry</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/industry/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "data": [
        {
            "id": 2,
            "industry_name": "industry2",
            "industry_description": "industry details",
            "active": 1,
            "created_at": "2021-08-19T06:20:51.000000Z",
            "updated_at": "2021-08-19T06:20:51.000000Z",
            "deleted_at": null
        },
        {
            "id": 1,
            "industry_name": "industry1",
            "industry_description": "industry details",
            "active": 1,
            "created_at": "2021-08-19T05:05:40.000000Z",
            "updated_at": "2021-08-19T05:05:40.000000Z",
            "deleted_at": null
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-industry-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-industry-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-industry-all"></code></pre>
</div>
<div id="execution-error-GETapi-industry-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-industry-all"></code></pre>
</div>
<form id="form-GETapi-industry-all" data-method="GET" data-path="api/industry/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-industry-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-industry-all" onclick="tryItOut('GETapi-industry-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-industry-all" onclick="cancelTryOut('GETapi-industry-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-industry-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/industry/all</code></b>
</p>
</form>
<h2>Get-Profession</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/profession/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "data": [
        {
            "id": 2,
            "profession_name": "profession2",
            "active": 1,
            "created_at": "2021-08-19T06:20:27.000000Z",
            "updated_at": "2021-08-19T06:20:27.000000Z"
        },
        {
            "id": 1,
            "profession_name": "profession1",
            "active": 1,
            "created_at": "2021-08-19T05:07:30.000000Z",
            "updated_at": "2021-08-19T05:07:30.000000Z"
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-profession-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-profession-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-profession-all"></code></pre>
</div>
<div id="execution-error-GETapi-profession-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-profession-all"></code></pre>
</div>
<form id="form-GETapi-profession-all" data-method="GET" data-path="api/profession/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-profession-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-profession-all" onclick="tryItOut('GETapi-profession-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-profession-all" onclick="cancelTryOut('GETapi-profession-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-profession-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/profession/all</code></b>
</p>
</form>
<h2>User Filter list</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/get-user-list/1/1/1/1/voluptatem/1/reprehenderit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "data": [
        {
            "id": 52,
            "user_name": "sourm",
            "first_name": "Sourajit",
            "last_name": "M",
            "looking_for": 1,
            "available_from": "2021-09-03 06:39:02",
            "available_to": "2021-09-03 06:39:02",
            "offering": 0,
            "email": "sourajitm8@gmail.com1",
            "industry_id": 1,
            "profession_id": 1,
            "address": "gfdgdgd",
            "latitude": 45.12,
            "longitude": 74.52,
            "distance": 0,
            "full_name": "Sourajit M",
            "role_name": "CLIENT",
            "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Sourajit&amp;color=7F9CF5&amp;background=EBF4FF",
            "industries": {
                "id": 1,
                "industry_name": "fghf",
                "industry_description": "fghfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:29.000000Z",
                "updated_at": "2021-09-03T07:07:29.000000Z",
                "deleted_at": null
            },
            "professions": {
                "id": 1,
                "profession_name": "gfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:21.000000Z",
                "updated_at": "2021-09-03T07:07:21.000000Z"
            }
        }
    ]
}</code></pre>
<div id="execution-results-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-"></code></pre>
</div>
<div id="execution-error-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-"></code></pre>
</div>
<form id="form-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" data-method="GET" data-path="api/get-user-list/{industry_id}/{profession_id}/{looking_for}/{offering}/{latitude}/{longitude}/{radius}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" onclick="tryItOut('GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" onclick="cancelTryOut('GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/get-user-list/{industry_id}/{profession_id}/{looking_for}/{offering}/{latitude}/{longitude}/{radius}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>industry_id</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="industry_id" data-endpoint="GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>profession_id</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="profession_id" data-endpoint="GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>looking_for</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="looking_for" data-endpoint="GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>offering</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="offering" data-endpoint="GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" data-component="url" required  hidden>
<br>
Example: 1/0
 @urlParam latitude number required
</p>
<p>
<b><code>latitude</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="latitude" data-endpoint="GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>longitude</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="longitude" data-endpoint="GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" data-component="url" required  hidden>
<br>
Example: 1
 @urlParam radius number required
</p>
<p>
<b><code>radius</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="radius" data-endpoint="GETapi-get-user-list--industry_id---profession_id---looking_for---offering---latitude---longitude---radius-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>User Filter list Post method Or condition</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "data": [
        {
            "id": 52,
            "user_name": "sourm",
            "first_name": "Sourajit",
            "last_name": "M",
            "looking_for": 1,
            "available_from": "2021-09-03 06:39:02",
            "available_to": "2021-09-03 06:39:02",
            "offering": 0,
            "email": "sourajitm8@gmail.com1",
            "industry_id": 1,
            "profession_id": 1,
            "address": "gfdgdgd",
            "latitude": 45.12,
            "longitude": 74.52,
            "distance": 0,
            "full_name": "Sourajit M",
            "role_name": "CLIENT",
            "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Sourajit&amp;color=7F9CF5&amp;background=EBF4FF",
            "industries": {
                "id": 1,
                "industry_name": "fghf",
                "industry_description": "fghfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:29.000000Z",
                "updated_at": "2021-09-03T07:07:29.000000Z",
                "deleted_at": null
            },
            "professions": {
                "id": 1,
                "profession_name": "gfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:21.000000Z",
                "updated_at": "2021-09-03T07:07:21.000000Z"
            }
        },
        {
            "id": 55,
            "user_name": "sourw",
            "first_name": "East",
            "last_name": "Zone",
            "looking_for": 1,
            "available_from": "2021-09-03 06:39:02",
            "available_to": "2021-09-03 06:39:02",
            "offering": 0,
            "email": "sourajitm@gmail.com",
            "industry_id": 1,
            "profession_id": 1,
            "address": "gfdgdgd",
            "latitude": 45.12,
            "longitude": 74.52,
            "distance": 0,
            "full_name": "East Zone",
            "role_name": "CLIENT",
            "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=East&amp;color=7F9CF5&amp;background=EBF4FF",
            "industries": {
                "id": 1,
                "industry_name": "fghf",
                "industry_description": "fghfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:29.000000Z",
                "updated_at": "2021-09-03T07:07:29.000000Z",
                "deleted_at": null
            },
            "professions": {
                "id": 1,
                "profession_name": "gfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:21.000000Z",
                "updated_at": "2021-09-03T07:07:21.000000Z"
            }
        }
    ]
}</code></pre>
<div id="execution-results-POSTapi-search" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-search"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-search"></code></pre>
</div>
<div id="execution-error-POSTapi-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-search"></code></pre>
</div>
<form id="form-POSTapi-search" data-method="POST" data-path="api/search" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-search', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-search" onclick="tryItOut('POSTapi-search');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-search" onclick="cancelTryOut('POSTapi-search');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-search" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/search</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>industry_id</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="industry_id" data-endpoint="POSTapi-search" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>profession_id</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="profession_id" data-endpoint="POSTapi-search" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>looking_for</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="looking_for" data-endpoint="POSTapi-search" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>offering</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="offering" data-endpoint="POSTapi-search" data-component="url" required  hidden>
<br>
Example: 1/0
 @urlParam latitude number required
</p>
<p>
<b><code>longitude</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="longitude" data-endpoint="POSTapi-search" data-component="url" required  hidden>
<br>
Example: 1
 @urlParam radius number required
</p>
</form>
<h2>User View</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "data": {
        "id": 54,
        "first_name": "test",
        "last_name": "test",
        "email": "test@test.com",
        "phone": "123456789",
        "address": null,
        "message": "message",
        "looking_for": 1,
        "offering": 0,
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "otp": null,
        "social_id": null,
        "social_account_type": null,
        "social_info": null,
        "device_type": null,
        "device_token": null,
        "industry_id": 1,
        "profession_id": 1,
        "latitude": null,
        "longitude": null,
        "available_from": "00:00:23",
        "available_to": "00:00:05",
        "active": 0,
        "created_at": "2021-08-19T05:07:36.000000Z",
        "updated_at": "2021-08-19T05:07:36.000000Z",
        "full_name": "test test",
        "role_name": "CLIENT",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=test&amp;color=7F9CF5&amp;background=EBF4FF"
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
<p>
<label id="auth-GETapi-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-user" data-component="header"></label>
</p>
</form>
<h2>Edit Profile</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/edit-my-profile"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('full_name', 'John');
body.append('profession_id', '1');
body.append('industry_id', 'long');
body.append('email', 'John@gmail.com');
body.append('phone', '1122334455');
body.append('address', 'address');
body.append('available_to', '1');
body.append('offering', '1');
body.append('available_from', 'ut');
body.append('profile_photo_path', document.querySelector('input[name="profile_photo_path"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! Profile update completed",
    "data": {
        "first_name": "sourajit",
        "last_name": "m",
        "user_name": "sourm",
        "email": "sourajitm8@gmail.com1",
        "address": "test address",
        "phone": null,
        "profession_id": "1",
        "industry_id": "1",
        "message": "message",
        "looking_for": "1",
        "offering": "0",
        "available_from": "23.14",
        "available_to": "5.01",
        "longitude": "74.52",
        "latitude": "45.12",
        "profile_photo_path": "\/uploads\/profile-photos\/16304800051228993330.png"
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Profile update failed!"
}</code></pre>
<div id="execution-results-POSTapi-edit-my-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-edit-my-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-edit-my-profile"></code></pre>
</div>
<div id="execution-error-POSTapi-edit-my-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-edit-my-profile"></code></pre>
</div>
<form id="form-POSTapi-edit-my-profile" data-method="POST" data-path="api/edit-my-profile" data-authed="0" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-edit-my-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-edit-my-profile" onclick="tryItOut('POSTapi-edit-my-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-edit-my-profile" onclick="cancelTryOut('POSTapi-edit-my-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-edit-my-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/edit-my-profile</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>full_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="full_name" data-endpoint="POSTapi-edit-my-profile" data-component="body" required  hidden>
<br>
Example: John Doe
* @bodyParam user_name string required
</p>
<p>
<b><code>profession_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="profession_id" data-endpoint="POSTapi-edit-my-profile" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>industry_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="industry_id" data-endpoint="POSTapi-edit-my-profile" data-component="body" required  hidden>
<br>
Example: 1
 @bodyParam  latitude string required  Example: lat
 @bodyParam  longitude string required
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>phone</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phone" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>available_to</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="available_to" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>
Example: 1630651142
 @bodyParam  looking for  required
</p>
<p>
<b><code>offering</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="offering" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>available_from</code></b>&nbsp;&nbsp;<small>Example:</small>     <i>optional</i> &nbsp;
<input type="text" name="available_from" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>
1630651142
</p>
<p>
<b><code>profile_photo_path</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
<input type="file" name="profile_photo_path" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>

</p>

</form>
<h2>Location Sink</h2>
<p>@bodyParam  latitude string required  Example: 33.15</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/sink-location"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "longitude": "85.14"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! Location update completed",
    "data": {
        "longitude": "33.15",
        "latitude": "85.14"
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "status": false,
    "message": "Location update failed!"
}</code></pre>
<div id="execution-results-POSTapi-sink-location" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-sink-location"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sink-location"></code></pre>
</div>
<div id="execution-error-POSTapi-sink-location" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sink-location"></code></pre>
</div>
<form id="form-POSTapi-sink-location" data-method="POST" data-path="api/sink-location" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-sink-location', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-sink-location" onclick="tryItOut('POSTapi-sink-location');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-sink-location" onclick="cancelTryOut('POSTapi-sink-location');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-sink-location" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/sink-location</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>longitude</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="longitude" data-endpoint="POSTapi-sink-location" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>Update-User</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/update-user/id"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! User updated",
    "data": {
        "id": 54,
        "first_name": "Jack",
        "last_name": "Dawson",
        "email": "jack@test.com",
        "phone": "5654665756",
        "address": "Test Address",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "otp": null,
        "social_id": null,
        "social_account_type": null,
        "latitude": "22.86",
        "longitude": "45.65",
        "available_from": "12.00",
        "available_to": "5.00",
        "social_info": null,
        "device_type": null,
        "device_token": null,
        "industry_id": "2",
        "profession_id": "2",
        "message": "message",
        "looking_for": "1",
        "offering": "0",
        "active": 0,
        "created_at": "2021-08-19T05:07:36.000000Z",
        "updated_at": "2021-08-19T08:06:38.000000Z",
        "full_name": "test test",
        "role_name": "CLIENT",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=test&amp;color=7F9CF5&amp;background=EBF4FF"
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-PATCHapi-update-user--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-update-user--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-update-user--user-"></code></pre>
</div>
<div id="execution-error-PATCHapi-update-user--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-update-user--user-"></code></pre>
</div>
<form id="form-PATCHapi-update-user--user-" data-method="PATCH" data-path="api/update-user/{user}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-update-user--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-update-user--user-" onclick="tryItOut('PATCHapi-update-user--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-update-user--user-" onclick="cancelTryOut('PATCHapi-update-user--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-update-user--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/update-user/{user}</code></b>
</p>
<p>
<label id="auth-PATCHapi-update-user--user-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-update-user--user-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="PATCHapi-update-user--user-" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Password Change</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/change_password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "old_password": "11111111",
    "new_password": "22222222",
    "confirm_password": "22222222"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status": true,
    "message": "Success! password change successfully",
    "data": {
        "id": 2,
        "first_name": "Emory",
        "last_name": "Wiza",
        "email": "lueilwitz.caterina@example.com",
        "phone": "(345) 744-1545",
        "email_verified_at": "2021-03-05T06:49:30.000000Z",
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-05T06:49:37.000000Z",
        "updated_at": "2021-03-08T07:50:35.000000Z",
        "full_name": "Emory Wiza",
        "role_name": "CLIENT",
        "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=Emory&amp;color=7F9CF5&amp;background=EBF4FF"
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-change_password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-change_password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-change_password"></code></pre>
</div>
<div id="execution-error-POSTapi-change_password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-change_password"></code></pre>
</div>
<form id="form-POSTapi-change_password" data-method="POST" data-path="api/change_password" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-change_password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-change_password" onclick="tryItOut('POSTapi-change_password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-change_password" onclick="cancelTryOut('POSTapi-change_password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-change_password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/change_password</code></b>
</p>
<p>
<label id="auth-POSTapi-change_password" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-change_password" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>old_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="old_password" data-endpoint="POSTapi-change_password" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>new_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="new_password" data-endpoint="POSTapi-change_password" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>confirm_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="confirm_password" data-endpoint="POSTapi-change_password" data-component="body" required  hidden>
<br>

</p>

</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["javascript"];
        setupLanguages(languages);
    });
</script>
</body>
</html>