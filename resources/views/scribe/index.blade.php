<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>NGHBR Documentation</title>

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
            <li>Last updated: May 4 2022</li>
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
</form><h1>Fcm Token Management</h1>
<p>APIs for managing basic chat functionality</p>
<h2>api/send-chat-request</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/send-chat-request"
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
    "message": "Success! Chat Request Send created",
    "data": {
        "receiver_id": "10",
        "sender_id": 52,
        "accept": 1,
        "updated_at": "2021-09-30T14:00:36.000000Z",
        "created_at": "2021-09-30T14:00:36.000000Z",
        "id": 10
    }
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-send-chat-request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-send-chat-request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-send-chat-request"></code></pre>
</div>
<div id="execution-error-POSTapi-send-chat-request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-send-chat-request"></code></pre>
</div>
<form id="form-POSTapi-send-chat-request" data-method="POST" data-path="api/send-chat-request" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-send-chat-request', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-send-chat-request" onclick="tryItOut('POSTapi-send-chat-request');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-send-chat-request" onclick="cancelTryOut('POSTapi-send-chat-request');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-send-chat-request" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/send-chat-request</code></b>
</p>
<p>
<label id="auth-POSTapi-send-chat-request" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-send-chat-request" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>receiver_id</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="receiver_id" data-endpoint="POSTapi-send-chat-request" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/accept-chat-request</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/accept-chat-request"
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
    "message": "Success! Request accepted",
    "data": [
        {
            "id": 1,
            "sender_id": 51,
            "receiver_id": 45,
            "accept": 2,
            "chat_token": "AS2GAw9dJpx4pt0uusmhM6oOv4HhOgH9",
            "active": 0,
            "created_at": "2021-10-04T13:28:54.000000Z",
            "updated_at": "2021-10-04T13:45:55.000000Z",
            "deleted_at": null,
            "sender_chat_request_id": {
                "id": 51,
                "first_name": "Monique",
                "last_name": "Welch",
                "user_name": null,
                "email": "ferry.melody@example.net",
                "phone": "231.688.6936",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T13:26:25.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": "22",
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T13:26:27.000000Z",
                "updated_at": "2021-10-04T13:28:27.000000Z",
                "full_name": "Monique Welch",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=MW&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400"
            },
            "receiver_chat_request_id": {
                "id": 45,
                "first_name": "Bernard",
                "last_name": "Terry",
                "user_name": null,
                "email": "rey27@example.net",
                "phone": "+1-651-661-7664",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T13:26:25.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": "22",
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T13:26:27.000000Z",
                "updated_at": "2021-10-04T13:29:27.000000Z",
                "full_name": "Bernard Terry",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=BT&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400"
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
<div id="execution-results-POSTapi-accept-chat-request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-accept-chat-request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-accept-chat-request"></code></pre>
</div>
<div id="execution-error-POSTapi-accept-chat-request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-accept-chat-request"></code></pre>
</div>
<form id="form-POSTapi-accept-chat-request" data-method="POST" data-path="api/accept-chat-request" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-accept-chat-request', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-accept-chat-request" onclick="tryItOut('POSTapi-accept-chat-request');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-accept-chat-request" onclick="cancelTryOut('POSTapi-accept-chat-request');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-accept-chat-request" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/accept-chat-request</code></b>
</p>
<p>
<label id="auth-POSTapi-accept-chat-request" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-accept-chat-request" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sender_id</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="sender_id" data-endpoint="POSTapi-accept-chat-request" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>api/cancel-chat-request</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cancel-chat-request"
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
    "message": "Success! Request cancelled"
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-cancel-chat-request" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-cancel-chat-request"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cancel-chat-request"></code></pre>
</div>
<div id="execution-error-POSTapi-cancel-chat-request" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cancel-chat-request"></code></pre>
</div>
<form id="form-POSTapi-cancel-chat-request" data-method="POST" data-path="api/cancel-chat-request" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-cancel-chat-request', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-cancel-chat-request" onclick="tryItOut('POSTapi-cancel-chat-request');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-cancel-chat-request" onclick="cancelTryOut('POSTapi-cancel-chat-request');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-cancel-chat-request" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/cancel-chat-request</code></b>
</p>
<p>
<label id="auth-POSTapi-cancel-chat-request" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-cancel-chat-request" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sender_id</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="sender_id" data-endpoint="POSTapi-cancel-chat-request" data-component="url" required  hidden>
<br>

</p>
</form>
<h2>Chat Details List</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/get-chat-details"
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
    "message": "",
    "data": [
        {
            "id": 2,
            "sender_id": 42,
            "receiver_id": 2,
            "accept": 2,
            "chat_token": "Ahg7R61uTzhKhLddhG2VDKkdvgQMoY68",
            "active": 1,
            "created_at": "2021-10-04T18:05:27.000000Z",
            "updated_at": "2021-04-02T00:00:00.000000Z",
            "deleted_at": null,
            "lastMessage": {
                "message": "Hii Jacky accept my request",
                "read": false,
                "receiver_id": 53,
                "sender_id": 54,
                "time": "Tue Oct 05 2021 12:07:34 GMT+0530"
            },
            "sender_chat_request_id": {
                "id": 42,
                "first_name": "Diamond",
                "last_name": "Lowe",
                "user_name": null,
                "email": "maybell21@example.net",
                "phone": "1-847-561-5377",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:51.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:57.000000Z",
                "updated_at": "2021-10-04T09:40:57.000000Z",
                "full_name": "Diamond Lowe",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=DL&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400",
                "industries": null,
                "professions": null
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Rebecca",
                "last_name": "Jacobi",
                "user_name": "rebecca_jacobi",
                "email": "ubogisich@example.com",
                "phone": "+1-425-265-9847",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": 1,
                "profession_id": 2,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:52.000000Z",
                "updated_at": "2021-10-04T12:32:41.000000Z",
                "full_name": "Rebecca Jacobi",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=RJ&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400",
                "industries": {
                    "id": 1,
                    "industry_name": "industry 1",
                    "industry_description": "svhskdbkdj",
                    "active": 1,
                    "created_at": "2021-10-04T18:07:58.000000Z",
                    "updated_at": "2021-10-04T18:07:58.000000Z",
                    "deleted_at": null
                },
                "professions": {
                    "id": 2,
                    "profession_name": "profession2",
                    "active": 1,
                    "created_at": "2021-10-04T18:08:47.000000Z",
                    "updated_at": "2021-10-04T18:08:47.000000Z"
                }
            }
        },
        {
            "id": 1,
            "sender_id": 6,
            "receiver_id": 2,
            "accept": 2,
            "chat_token": "XnS1OXNREigzD9OYl9ZJdE3ZvfvJEQNn",
            "active": 1,
            "created_at": "2021-10-04T18:05:27.000000Z",
            "updated_at": "2021-10-04T18:05:27.000000Z",
            "deleted_at": null,
            "lastMessage": {
                "message": "Accept pls",
                "read": false,
                "receiver_id": 55,
                "sender_id": 53,
                "time": "Mon Oct 04 2021 17:35:26 GMT+0530"
            },
            "sender_chat_request_id": {
                "id": 6,
                "first_name": "Vida",
                "last_name": "Grant",
                "user_name": null,
                "email": "xhamill@example.org",
                "phone": "605.388.8187",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:54.000000Z",
                "updated_at": "2021-10-04T09:40:54.000000Z",
                "full_name": "Vida Grant",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=VG&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400",
                "industries": null,
                "professions": null
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Rebecca",
                "last_name": "Jacobi",
                "user_name": "rebecca_jacobi",
                "email": "ubogisich@example.com",
                "phone": "+1-425-265-9847",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": 1,
                "profession_id": 2,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:52.000000Z",
                "updated_at": "2021-10-04T12:32:41.000000Z",
                "full_name": "Rebecca Jacobi",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=RJ&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400",
                "industries": {
                    "id": 1,
                    "industry_name": "industry 1",
                    "industry_description": "svhskdbkdj",
                    "active": 1,
                    "created_at": "2021-10-04T18:07:58.000000Z",
                    "updated_at": "2021-10-04T18:07:58.000000Z",
                    "deleted_at": null
                },
                "professions": {
                    "id": 2,
                    "profession_name": "profession2",
                    "active": 1,
                    "created_at": "2021-10-04T18:08:47.000000Z",
                    "updated_at": "2021-10-04T18:08:47.000000Z"
                }
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
<div id="execution-results-GETapi-get-chat-details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-get-chat-details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-chat-details"></code></pre>
</div>
<div id="execution-error-GETapi-get-chat-details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-chat-details"></code></pre>
</div>
<form id="form-GETapi-get-chat-details" data-method="GET" data-path="api/get-chat-details" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-get-chat-details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-get-chat-details" onclick="tryItOut('GETapi-get-chat-details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-get-chat-details" onclick="cancelTryOut('GETapi-get-chat-details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-get-chat-details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/get-chat-details</code></b>
</p>
<p>
<label id="auth-GETapi-get-chat-details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-get-chat-details" data-component="header"></label>
</p>
</form>
<h2>User Chat Request List</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/get-chat-request-details"
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
    "message": "",
    "data": [
        {
            "id": 2,
            "sender_id": 42,
            "receiver_id": 2,
            "accept": 1,
            "chat_token": "Ahg7R61uTzhKhLddhG2VDKkdvgQMoY68",
            "active": 1,
            "created_at": "2021-10-04T18:05:27.000000Z",
            "updated_at": "2021-04-02T00:00:00.000000Z",
            "deleted_at": null,
            "lastMessage": {
                "message": "Hii Jacky accept my request",
                "read": false,
                "receiver_id": 53,
                "sender_id": 54,
                "time": "Tue Oct 05 2021 12:07:34 GMT+0530"
            },
            "sender_chat_request_id": {
                "id": 42,
                "first_name": "Diamond",
                "last_name": "Lowe",
                "user_name": null,
                "email": "maybell21@example.net",
                "phone": "1-847-561-5377",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:51.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:57.000000Z",
                "updated_at": "2021-10-04T09:40:57.000000Z",
                "full_name": "Diamond Lowe",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=DL&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400",
                "industries": null,
                "professions": null
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Rebecca",
                "last_name": "Jacobi",
                "user_name": "rebecca_jacobi",
                "email": "ubogisich@example.com",
                "phone": "+1-425-265-9847",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": 1,
                "profession_id": 2,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:52.000000Z",
                "updated_at": "2021-10-04T12:32:41.000000Z",
                "full_name": "Rebecca Jacobi",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=RJ&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400",
                "industries": {
                    "id": 1,
                    "industry_name": "industry 1",
                    "industry_description": "svhskdbkdj",
                    "active": 1,
                    "created_at": "2021-10-04T18:07:58.000000Z",
                    "updated_at": "2021-10-04T18:07:58.000000Z",
                    "deleted_at": null
                },
                "professions": {
                    "id": 2,
                    "profession_name": "profession2",
                    "active": 1,
                    "created_at": "2021-10-04T18:08:47.000000Z",
                    "updated_at": "2021-10-04T18:08:47.000000Z"
                }
            }
        },
        {
            "id": 1,
            "sender_id": 6,
            "receiver_id": 2,
            "accept": 1,
            "chat_token": "XnS1OXNREigzD9OYl9ZJdE3ZvfvJEQNn",
            "active": 1,
            "created_at": "2021-10-04T18:05:27.000000Z",
            "updated_at": "2021-10-04T18:05:27.000000Z",
            "deleted_at": null,
            "lastMessage": {
                "message": "Accept pls",
                "read": false,
                "receiver_id": 55,
                "sender_id": 53,
                "time": "Mon Oct 04 2021 17:35:26 GMT+0530"
            },
            "sender_chat_request_id": {
                "id": 6,
                "first_name": "Vida",
                "last_name": "Grant",
                "user_name": null,
                "email": "xhamill@example.org",
                "phone": "605.388.8187",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:54.000000Z",
                "updated_at": "2021-10-04T09:40:54.000000Z",
                "full_name": "Vida Grant",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=VG&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400",
                "industries": null,
                "professions": null
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Rebecca",
                "last_name": "Jacobi",
                "user_name": "rebecca_jacobi",
                "email": "ubogisich@example.com",
                "phone": "+1-425-265-9847",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": 1,
                "profession_id": 2,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:52.000000Z",
                "updated_at": "2021-10-04T12:32:41.000000Z",
                "full_name": "Rebecca Jacobi",
                "role_name": "CLIENT",
                "profile_photo_url": "https:\/\/ui-avatars.com\/api\/?name=RJ&amp;color=FFFFFF&amp;background=a85232&amp;height=400&amp;width=400",
                "industries": {
                    "id": 1,
                    "industry_name": "industry 1",
                    "industry_description": "svhskdbkdj",
                    "active": 1,
                    "created_at": "2021-10-04T18:07:58.000000Z",
                    "updated_at": "2021-10-04T18:07:58.000000Z",
                    "deleted_at": null
                },
                "professions": {
                    "id": 2,
                    "profession_name": "profession2",
                    "active": 1,
                    "created_at": "2021-10-04T18:08:47.000000Z",
                    "updated_at": "2021-10-04T18:08:47.000000Z"
                }
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
<div id="execution-results-GETapi-get-chat-request-details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-get-chat-request-details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-chat-request-details"></code></pre>
</div>
<div id="execution-error-GETapi-get-chat-request-details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-chat-request-details"></code></pre>
</div>
<form id="form-GETapi-get-chat-request-details" data-method="GET" data-path="api/get-chat-request-details" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-get-chat-request-details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-get-chat-request-details" onclick="tryItOut('GETapi-get-chat-request-details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-get-chat-request-details" onclick="cancelTryOut('GETapi-get-chat-request-details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-get-chat-request-details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/get-chat-request-details</code></b>
</p>
<p>
<label id="auth-GETapi-get-chat-request-details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-get-chat-request-details" data-component="header"></label>
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
    "http://localhost/api/invites/perspiciatis"
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
    "http://localhost/api/invites/exercitationem"
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
    "http://localhost/api/invites/voluptatem"
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
</form><h1>Product Details Management</h1>
<p>APIs for managing  Product Details functionality</p>
<h2>Location Sink</h2>
<p>@bodyParam  active integer required  Example: 0/1</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/product-status-change"
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
<pre><code class="language-json">
{
{
"status": true,
"message": "Success!  update completed",
"data": {
"active": "1",
"id": "4"
}
}</code></pre>
<div id="execution-results-POSTapi-product-status-change" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-product-status-change"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-product-status-change"></code></pre>
</div>
<div id="execution-error-POSTapi-product-status-change" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-product-status-change"></code></pre>
</div>
<form id="form-POSTapi-product-status-change" data-method="POST" data-path="api/product-status-change" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-product-status-change', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-product-status-change" onclick="tryItOut('POSTapi-product-status-change');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-product-status-change" onclick="cancelTryOut('POSTapi-product-status-change');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-product-status-change" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/product-status-change</code></b>
</p>
</form>
<h2>api/save-product-user-data</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/save-product-user-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "profession_id": "1",
    "product_token": "123456"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
{
"status": true,
"message": "Success! Product created",
"data": {
"profession_id": "1",
"product_token": "12345678",
"sender_id": 5,
"updated_at": "2022-09-20T16:37:31.000000Z",
"created_at": "2022-09-20T16:37:31.000000Z",
"id": 4
}
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-POSTapi-save-product-user-data" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-save-product-user-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-save-product-user-data"></code></pre>
</div>
<div id="execution-error-POSTapi-save-product-user-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-save-product-user-data"></code></pre>
</div>
<form id="form-POSTapi-save-product-user-data" data-method="POST" data-path="api/save-product-user-data" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-save-product-user-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-save-product-user-data" onclick="tryItOut('POSTapi-save-product-user-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-save-product-user-data" onclick="cancelTryOut('POSTapi-save-product-user-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-save-product-user-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/save-product-user-data</code></b>
</p>
<p>
<label id="auth-POSTapi-save-product-user-data" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-save-product-user-data" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>profession_id</code></b>&nbsp;&nbsp;<small>product</small>     <i>optional</i> &nbsp;
<input type="text" name="profession_id" data-endpoint="POSTapi-save-product-user-data" data-component="body"  hidden>
<br>
id required
</p>
<p>
<b><code>product_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="product_token" data-endpoint="POSTapi-save-product-user-data" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/get-product-user-data</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/get-product-user-data"
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
<pre><code class="language-json">
{
{
"status": true,
"data": [
{
"id": 4,
"sender_id": 5,
"verify_user_id": null,
"profession_id": 1,
"accept": 1,
"product_token": "12345678",
"active": 1,
"created_at": "2022-09-20T16:37:31.000000Z",
"updated_at": "2022-09-20T16:37:31.000000Z",
"deleted_at": null,
"product_request_id": {
"id": 1,
"profession_name": "Business Owner",
"profession_description": null,
"profession_photo_path": null,
"active": 1,
"created_at": "2022-09-20T14:31:34.000000Z",
"updated_at": "2022-09-20T14:31:34.000000Z"
}
}
]
}
}</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<div id="execution-results-GETapi-get-product-user-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-get-product-user-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-product-user-data"></code></pre>
</div>
<div id="execution-error-GETapi-get-product-user-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-product-user-data"></code></pre>
</div>
<form id="form-GETapi-get-product-user-data" data-method="GET" data-path="api/get-product-user-data" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-get-product-user-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-get-product-user-data" onclick="tryItOut('GETapi-get-product-user-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-get-product-user-data" onclick="cancelTryOut('GETapi-get-product-user-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-get-product-user-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/get-product-user-data</code></b>
</p>
<p>
<label id="auth-GETapi-get-product-user-data" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-get-product-user-data" data-component="header"></label>
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
    "Profile": "1",
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
<pre><code class="language-json">
{
"status": true,
"message": "Success! Registration completed",
"token": "89|wTbWEMzBDJo5HakTF3JeCQWgntkTb4lrdfAHQKDw",
"data": {
"first_name": "Jay",
"last_name": "Sinha",
"user_name": "jay12",
"email": "jay12@yopmail.com",
"phone": null,
"profession_id": "1",
"industry_id": "1",
"address": null,
"message": null,
"looking_for": "1",
"offering": "0",
"updated_at": "2021-09-15T15:43:33.000000Z",
"created_at": "2021-09-15T15:43:33.000000Z",
"id": 82,
"full_name": "Jay Sinha",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Jay&amp;color=7F9CF5&amp;background=EBF4FF",
"roles": [
{
"id": 2,
"name": "CLIENT",
"guard_name": "web",
"created_at": "2021-09-10T13:37:58.000000Z",
"updated_at": "2021-09-10T13:37:58.000000Z",
"pivot": {
"model_id": 82,
"role_id": 2,
"model_type": "App\\Models\\User"
}
}
]
}
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
 @bodyParam  offering for string required  Example: 1
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
<h2>api/verify-signup-otp</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/verify-signup-otp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "John@gmail.com",
    "otp": "1234"
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
    "message": "Success",
    "data": {
        "token": "4|wdvK3OkyuYz7D5904oX6A7nbCqoZWOR8dX0QFKf9",
        "name": "sourajitmaity",
        "email": "sourajit@gmail.com"
    }
}</code></pre>
<div id="execution-results-POSTapi-verify-signup-otp" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-verify-signup-otp"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-verify-signup-otp"></code></pre>
</div>
<div id="execution-error-POSTapi-verify-signup-otp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-verify-signup-otp"></code></pre>
</div>
<form id="form-POSTapi-verify-signup-otp" data-method="POST" data-path="api/verify-signup-otp" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-verify-signup-otp', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-verify-signup-otp" onclick="tryItOut('POSTapi-verify-signup-otp');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-verify-signup-otp" onclick="cancelTryOut('POSTapi-verify-signup-otp');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-verify-signup-otp" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/verify-signup-otp</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-verify-signup-otp" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>otp</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="otp" data-endpoint="POSTapi-verify-signup-otp" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/resend-signup-otp</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/resend-signup-otp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "John@gmail.com"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
"status": true,
"message": "A one time password is send to your registered email id",
}</code></pre>
<div id="execution-results-POSTapi-resend-signup-otp" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-resend-signup-otp"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-resend-signup-otp"></code></pre>
</div>
<div id="execution-error-POSTapi-resend-signup-otp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-resend-signup-otp"></code></pre>
</div>
<form id="form-POSTapi-resend-signup-otp" data-method="POST" data-path="api/resend-signup-otp" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-resend-signup-otp', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-resend-signup-otp" onclick="tryItOut('POSTapi-resend-signup-otp');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-resend-signup-otp" onclick="cancelTryOut('POSTapi-resend-signup-otp');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-resend-signup-otp" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/resend-signup-otp</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-resend-signup-otp" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/resend-otp</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/resend-otp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "John@gmail.com"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
"status": true,
"message": "A one time password is send to your registered email id",
}</code></pre>
<div id="execution-results-POSTapi-resend-otp" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-resend-otp"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-resend-otp"></code></pre>
</div>
<div id="execution-error-POSTapi-resend-otp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-resend-otp"></code></pre>
</div>
<form id="form-POSTapi-resend-otp" data-method="POST" data-path="api/resend-otp" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-resend-otp', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-resend-otp" onclick="tryItOut('POSTapi-resend-otp');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-resend-otp" onclick="cancelTryOut('POSTapi-resend-otp');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-resend-otp" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/resend-otp</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-resend-otp" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/forgot-password</h2>
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
    "email": "user@user.com"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
"status": true,
"message": "A one time password is send to your registered email id",
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

</form>
<h2>api/verify_forgot_otp</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/verify_forgot_otp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "otp": "quibusdam",
    "email": "vero"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
"status": true,
"message": "Otp matched",
}</code></pre>
<div id="execution-results-POSTapi-verify_forgot_otp" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-verify_forgot_otp"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-verify_forgot_otp"></code></pre>
</div>
<div id="execution-error-POSTapi-verify_forgot_otp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-verify_forgot_otp"></code></pre>
</div>
<form id="form-POSTapi-verify_forgot_otp" data-method="POST" data-path="api/verify_forgot_otp" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-verify_forgot_otp', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-verify_forgot_otp" onclick="tryItOut('POSTapi-verify_forgot_otp');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-verify_forgot_otp" onclick="cancelTryOut('POSTapi-verify_forgot_otp');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-verify_forgot_otp" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/verify_forgot_otp</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>otp</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="otp" data-endpoint="POSTapi-verify_forgot_otp" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-verify_forgot_otp" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>api/reset-password</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/reset-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "optio",
    "password": "debitis"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">
{
"status": true,
"message": "Otp matched",
}</code></pre>
<div id="execution-results-POSTapi-reset-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reset-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reset-password"></code></pre>
</div>
<div id="execution-error-POSTapi-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reset-password"></code></pre>
</div>
<form id="form-POSTapi-reset-password" data-method="POST" data-path="api/reset-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reset-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-reset-password" onclick="tryItOut('POSTapi-reset-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-reset-password" onclick="cancelTryOut('POSTapi-reset-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-reset-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reset-password</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-reset-password" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-reset-password" data-component="body" required  hidden>
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
<h2>User Block List</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user-block"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "block_user_id": 85
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
    "message": "Success! User Blocked Successfully"
}</code></pre>
<div id="execution-results-POSTapi-user-block" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-block"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-block"></code></pre>
</div>
<div id="execution-error-POSTapi-user-block" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-block"></code></pre>
</div>
<form id="form-POSTapi-user-block" data-method="POST" data-path="api/user-block" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-block', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-block" onclick="tryItOut('POSTapi-user-block');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-block" onclick="cancelTryOut('POSTapi-user-block');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-block" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user-block</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>block_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="block_user_id" data-endpoint="POSTapi-user-block" data-component="body" required  hidden>
<br>

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
body.append('full_name', 'John Doe');
body.append('user_name', 'John');
body.append('profession_id', '1');
body.append('industry_id', 'long');
body.append('email', 'John@gmail.com');
body.append('phone', '1122334455');
body.append('address', 'address');
body.append('available_to', '1');
body.append('offering', '1');
body.append('linked_in_link', '@bodyParam  instagram_link   required  Example:');
body.append('facebook_link', 'iure');
body.append('available_from', 'magnam');
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

</p>
<p>
<b><code>user_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user_name" data-endpoint="POSTapi-edit-my-profile" data-component="body" required  hidden>
<br>

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
<b><code>linked_in_link</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="linked_in_link" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>facebook_link</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="facebook_link" data-endpoint="POSTapi-edit-my-profile" data-component="body"  hidden>
<br>
Example:
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
<h2>Password Change</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/change-password"
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
<div id="execution-results-POSTapi-change-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-change-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-change-password"></code></pre>
</div>
<div id="execution-error-POSTapi-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-change-password"></code></pre>
</div>
<form id="form-POSTapi-change-password" data-method="POST" data-path="api/change-password" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-change-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-change-password" onclick="tryItOut('POSTapi-change-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-change-password" onclick="cancelTryOut('POSTapi-change-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-change-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/change-password</code></b>
</p>
<p>
<label id="auth-POSTapi-change-password" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-change-password" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>old_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="old_password" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>new_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="new_password" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>confirm_password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="confirm_password" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>

</p>

</form>
<h2>Get all User</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user/all"
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
<pre><code class="language-json">
{
"status": true,
"data": [
{
"id": 33,
"first_name": "Sonia",
"last_name": "Russel",
"user_name": null,
"email": "kskiles@example.org",
"phone": "386.569.4741",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Sonia Russel",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Sonia&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 34,
"first_name": "Javonte",
"last_name": "Quigley",
"user_name": null,
"email": "allie.bosco@example.net",
"phone": "838.425.6273",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Javonte Quigley",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Javonte&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 35,
"first_name": "Vella",
"last_name": "Padberg",
"user_name": null,
"email": "christophe03@example.org",
"phone": "1-959-934-8275",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Vella Padberg",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Vella&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 36,
"first_name": "Damon",
"last_name": "Cruickshank",
"user_name": null,
"email": "grace64@example.net",
"phone": "+1-404-907-2735",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Damon Cruickshank",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Damon&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 37,
"first_name": "Josh",
"last_name": "Kshlerin",
"user_name": null,
"email": "rigoberto.hilpert@example.org",
"phone": "1-859-832-5532",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Josh Kshlerin",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Josh&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 38,
"first_name": "Annabell",
"last_name": "Altenwerth",
"user_name": null,
"email": "emilia72@example.net",
"phone": "+1.321.710.6046",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Annabell Altenwerth",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Annabell&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 39,
"first_name": "Khalil",
"last_name": "Bogisich",
"user_name": null,
"email": "pfannerstill.mia@example.com",
"phone": "703-659-1138",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Khalil Bogisich",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Khalil&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 40,
"first_name": "Dedric",
"last_name": "Collier",
"user_name": null,
"email": "nabbott@example.org",
"phone": "+13137499316",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Dedric Collier",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Dedric&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 41,
"first_name": "Patricia",
"last_name": "Nienow",
"user_name": null,
"email": "yasmin.barrows@example.net",
"phone": "+1-754-649-8095",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Patricia Nienow",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Patricia&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 42,
"first_name": "Jaylen",
"last_name": "McClure",
"user_name": null,
"email": "reynolds.jonathan@example.net",
"phone": "(253) 502-3505",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Jaylen McClure",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Jaylen&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 43,
"first_name": "Britney",
"last_name": "Schaden",
"user_name": null,
"email": "dach.cathryn@example.com",
"phone": "+1-432-264-3426",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Britney Schaden",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Britney&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 44,
"first_name": "Nicklaus",
"last_name": "Fisher",
"user_name": null,
"email": "qmclaughlin@example.net",
"phone": "1-352-707-6811",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Nicklaus Fisher",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Nicklaus&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 45,
"first_name": "Demetris",
"last_name": "Gottlieb",
"user_name": null,
"email": "alexane.feil@example.org",
"phone": "+1-228-755-9347",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Demetris Gottlieb",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Demetris&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 46,
"first_name": "Daren",
"last_name": "Walker",
"user_name": null,
"email": "schumm.kailey@example.org",
"phone": "(458) 534-7533",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Daren Walker",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Daren&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 47,
"first_name": "Cora",
"last_name": "Harvey",
"user_name": null,
"email": "maegan15@example.org",
"phone": "951.284.7444",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Cora Harvey",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Cora&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 48,
"first_name": "Mariah",
"last_name": "Rohan",
"user_name": null,
"email": "angelo45@example.org",
"phone": "+1 (862) 489-7538",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Mariah Rohan",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Mariah&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 49,
"first_name": "Jennie",
"last_name": "Spencer",
"user_name": null,
"email": "wmiller@example.net",
"phone": "667.658.9074",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Jennie Spencer",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Jennie&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 50,
"first_name": "Felipa",
"last_name": "Reynolds",
"user_name": null,
"email": "jordan35@example.com",
"phone": "+1-540-888-5894",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Felipa Reynolds",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Felipa&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 51,
"first_name": "Rafaela",
"last_name": "Howe",
"user_name": null,
"email": "kub.kathryne@example.net",
"phone": "843-864-0546",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:10.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:12.000000Z",
"updated_at": "2021-09-21T11:16:12.000000Z",
"full_name": "Rafaela Howe",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Rafaela&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 10,
"first_name": "Akeem",
"last_name": "Pacocha",
"user_name": null,
"email": "ufahey@example.com",
"phone": "+1-828-767-0174",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Akeem Pacocha",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Akeem&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 11,
"first_name": "Tressa",
"last_name": "Wiza",
"user_name": null,
"email": "kelli69@example.com",
"phone": "(726) 576-4678",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Tressa Wiza",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Tressa&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 12,
"first_name": "Ofelia",
"last_name": "Skiles",
"user_name": null,
"email": "jerrod.nolan@example.org",
"phone": "509.850.9927",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Ofelia Skiles",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Ofelia&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 13,
"first_name": "Shakira",
"last_name": "Willms",
"user_name": null,
"email": "xaltenwerth@example.net",
"phone": "+1 (209) 834-3483",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Shakira Willms",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Shakira&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 14,
"first_name": "Jeffrey",
"last_name": "Crona",
"user_name": null,
"email": "darrin.aufderhar@example.org",
"phone": "+1.689.756.4551",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Jeffrey Crona",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Jeffrey&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 15,
"first_name": "Bridget",
"last_name": "Mosciski",
"user_name": null,
"email": "kaci.kihn@example.net",
"phone": "754-731-0874",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Bridget Mosciski",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Bridget&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 16,
"first_name": "Reece",
"last_name": "Robel",
"user_name": null,
"email": "jovani.brakus@example.com",
"phone": "(865) 910-9680",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Reece Robel",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Reece&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 17,
"first_name": "Horacio",
"last_name": "Schulist",
"user_name": null,
"email": "wuckert.misty@example.net",
"phone": "+1.856.801.6175",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Horacio Schulist",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Horacio&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 18,
"first_name": "Gilbert",
"last_name": "Carter",
"user_name": null,
"email": "merritt.murazik@example.org",
"phone": "248.413.1524",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Gilbert Carter",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Gilbert&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 19,
"first_name": "Karli",
"last_name": "Krajcik",
"user_name": null,
"email": "skemmer@example.org",
"phone": "(540) 264-2393",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Karli Krajcik",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Karli&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 20,
"first_name": "Cydney",
"last_name": "Kuhlman",
"user_name": null,
"email": "gerlach.wilfredo@example.net",
"phone": "480-440-9901",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Cydney Kuhlman",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Cydney&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 21,
"first_name": "Casimir",
"last_name": "Thiel",
"user_name": null,
"email": "alfreda.eichmann@example.org",
"phone": "+1.607.689.8415",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Casimir Thiel",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Casimir&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 22,
"first_name": "Gonzalo",
"last_name": "Cremin",
"user_name": null,
"email": "porter.luettgen@example.com",
"phone": "949.935.8236",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Gonzalo Cremin",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Gonzalo&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 23,
"first_name": "Georgiana",
"last_name": "Weber",
"user_name": null,
"email": "ryley.muller@example.org",
"phone": "816.304.9518",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Georgiana Weber",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Georgiana&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 24,
"first_name": "Julien",
"last_name": "Metz",
"user_name": null,
"email": "ibotsford@example.com",
"phone": "+1-503-624-9161",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Julien Metz",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Julien&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 25,
"first_name": "Bridget",
"last_name": "Mraz",
"user_name": null,
"email": "kkautzer@example.org",
"phone": "+1.862.230.3181",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Bridget Mraz",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Bridget&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 26,
"first_name": "Myrtie",
"last_name": "Littel",
"user_name": null,
"email": "satterfield.keara@example.net",
"phone": "(337) 648-5925",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Myrtie Littel",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Myrtie&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 27,
"first_name": "Bennett",
"last_name": "Hintz",
"user_name": null,
"email": "susie.vandervort@example.com",
"phone": "(973) 729-0240",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Bennett Hintz",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Bennett&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 28,
"first_name": "Kurt",
"last_name": "Dickens",
"user_name": null,
"email": "murazik.alda@example.org",
"phone": "+1-626-892-8939",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Kurt Dickens",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Kurt&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 29,
"first_name": "Arturo",
"last_name": "Volkman",
"user_name": null,
"email": "sienna.rosenbaum@example.net",
"phone": "512.236.8829",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Arturo Volkman",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Arturo&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 30,
"first_name": "Cleveland",
"last_name": "Pfeffer",
"user_name": null,
"email": "bart06@example.net",
"phone": "+15515755445",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Cleveland Pfeffer",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Cleveland&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 31,
"first_name": "Hazle",
"last_name": "Kuhlman",
"user_name": null,
"email": "mharris@example.com",
"phone": "423-774-6955",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Hazle Kuhlman",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Hazle&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 32,
"first_name": "Genevieve",
"last_name": "Mills",
"user_name": null,
"email": "bethany49@example.net",
"phone": "985.629.2363",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:09.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:11.000000Z",
"updated_at": "2021-09-21T11:16:11.000000Z",
"full_name": "Genevieve Mills",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Genevieve&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 2,
"first_name": "Van",
"last_name": "Lang",
"user_name": null,
"email": "iraynor@example.com",
"phone": "(276) 431-2962",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:07.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:10.000000Z",
"updated_at": "2021-09-21T11:16:10.000000Z",
"full_name": "Van Lang",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Van&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 3,
"first_name": "Heber",
"last_name": "Beatty",
"user_name": null,
"email": "breanna22@example.com",
"phone": "+1.786.845.7808",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:07.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:10.000000Z",
"updated_at": "2021-09-21T11:16:10.000000Z",
"full_name": "Heber Beatty",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Heber&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 4,
"first_name": "Conner",
"last_name": "Hickle",
"user_name": null,
"email": "alvena36@example.com",
"phone": "+12312838523",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:07.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:10.000000Z",
"updated_at": "2021-09-21T11:16:10.000000Z",
"full_name": "Conner Hickle",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Conner&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 5,
"first_name": "Thomas",
"last_name": "Moen",
"user_name": null,
"email": "jeramy.cormier@example.com",
"phone": "574-271-1037",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:07.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:10.000000Z",
"updated_at": "2021-09-21T11:16:10.000000Z",
"full_name": "Thomas Moen",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Thomas&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 6,
"first_name": "Kaylin",
"last_name": "Fay",
"user_name": null,
"email": "athena01@example.com",
"phone": "1-210-647-5284",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:07.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:10.000000Z",
"updated_at": "2021-09-21T11:16:10.000000Z",
"full_name": "Kaylin Fay",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Kaylin&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 7,
"first_name": "Cole",
"last_name": "Kohler",
"user_name": null,
"email": "daren.spencer@example.net",
"phone": "906-359-7474",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:07.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:10.000000Z",
"updated_at": "2021-09-21T11:16:10.000000Z",
"full_name": "Cole Kohler",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Cole&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 8,
"first_name": "Vilma",
"last_name": "Donnelly",
"user_name": null,
"email": "luz15@example.net",
"phone": "+1-678-561-7114",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:10.000000Z",
"updated_at": "2021-09-21T11:16:10.000000Z",
"full_name": "Vilma Donnelly",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Vilma&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 9,
"first_name": "Alysson",
"last_name": "Grant",
"user_name": null,
"email": "mcglynn.heaven@example.org",
"phone": "+1 (619) 950-1556",
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": "2021-09-21T11:16:08.000000Z",
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 0,
"created_at": "2021-09-21T11:16:10.000000Z",
"updated_at": "2021-09-21T11:16:10.000000Z",
"full_name": "Alysson Grant",
"role_name": "CLIENT",
"profile_photo_url": "https://ui-avatars.com/api/?name=Alysson&amp;color=FFFFFF&amp;background=a85232"
},
{
"id": 1,
"first_name": "Admin",
"last_name": "Admin",
"user_name": null,
"email": "admin@admin.com",
"phone": null,
"address": null,
"message": null,
"looking_for": 0,
"offering": 0,
"email_verified_at": null,
"current_team_id": null,
"profile_photo_path": null,
"otp": null,
"social_id": null,
"social_account_type": null,
"latitude": null,
"longitude": null,
"available_from": null,
"available_to": null,
"social_info": null,
"device_type": null,
"device_token": null,
"industry_id": null,
"profession_id": null,
"active": 1,
"created_at": "2021-09-21T11:16:06.000000Z",
"updated_at": "2021-09-21T11:16:06.000000Z",
"full_name": "Admin Admin",
"role_name": "SUPER-ADMIN",
"profile_photo_url": "https://ui-avatars.com/api/?name=Admin&amp;color=FFFFFF&amp;background=a85232"
}
]
}
}</code></pre>
<div id="execution-results-GETapi-user-all" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user-all"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-all"></code></pre>
</div>
<div id="execution-error-GETapi-user-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-all"></code></pre>
</div>
<form id="form-GETapi-user-all" data-method="GET" data-path="api/user/all" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user-all', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user-all" onclick="tryItOut('GETapi-user-all');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user-all" onclick="cancelTryOut('GETapi-user-all');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user-all" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user/all</code></b>
</p>
</form>
<h2>api/last-filter-data</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/last-filter-data"
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
        "id": 9,
        "latitude": 45.15,
        "longitude": 74.52,
        "looking_for": 1,
        "offering": 0,
        "industry_id": null,
        "profession_id": null,
        "user_id": 56,
        "radius": null,
        "created_at": "2021-09-21T14:27:41.000000Z",
        "updated_at": "2021-09-21T14:27:41.000000Z",
        "user": {
            "id": 56,
            "first_name": "East",
            "last_name": "Zones1121",
            "user_name": "ray11121121",
            "email": "ra@gmail.com1121",
            "phone": null,
            "address": "seminyak",
            "message": "ghfhg",
            "looking_for": 1,
            "offering": 0,
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": "\/uploads\/profile-photos\/1632234398932385192.png",
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": 22.14,
            "longitude": 88.21,
            "available_from": "Thu Sep 16 2021 15:12:23 GMT+0530 (India Standard Time)",
            "available_to": "Fri Sep 16 2021 14:56:34 GMT+0530 (India Standard Time)",
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": 1,
            "profession_id": 1,
            "active": 0,
            "created_at": "2021-09-21T14:25:29.000000Z",
            "updated_at": "2021-09-21T14:26:38.000000Z",
            "full_name": "East Zones1121",
            "role_name": "CLIENT",
            "profile_photo_url": "http:\/\/localhost\/storage\/uploads\/profile-photos\/1632234398932385192.png"
        }
    }
}</code></pre>
<div id="execution-results-GETapi-last-filter-data" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-last-filter-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-last-filter-data"></code></pre>
</div>
<div id="execution-error-GETapi-last-filter-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-last-filter-data"></code></pre>
</div>
<form id="form-GETapi-last-filter-data" data-method="GET" data-path="api/last-filter-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-last-filter-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-last-filter-data" onclick="tryItOut('GETapi-last-filter-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-last-filter-data" onclick="cancelTryOut('GETapi-last-filter-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-last-filter-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/last-filter-data</code></b>
</p>
</form>
<h2>api/store-filter-data</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/store-filter-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-POSTapi-store-filter-data" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-store-filter-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-store-filter-data"></code></pre>
</div>
<div id="execution-error-POSTapi-store-filter-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-store-filter-data"></code></pre>
</div>
<form id="form-POSTapi-store-filter-data" data-method="POST" data-path="api/store-filter-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-store-filter-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-store-filter-data" onclick="tryItOut('POSTapi-store-filter-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-store-filter-data" onclick="cancelTryOut('POSTapi-store-filter-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-store-filter-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/store-filter-data</code></b>
</p>
</form>
<h2>api/get-filter-data</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/get-filter-data"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>
<div id="execution-results-POSTapi-get-filter-data" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-get-filter-data"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-get-filter-data"></code></pre>
</div>
<div id="execution-error-POSTapi-get-filter-data" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-get-filter-data"></code></pre>
</div>
<form id="form-POSTapi-get-filter-data" data-method="POST" data-path="api/get-filter-data" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-get-filter-data', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-get-filter-data" onclick="tryItOut('POSTapi-get-filter-data');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-get-filter-data" onclick="cancelTryOut('POSTapi-get-filter-data');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-get-filter-data" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/get-filter-data</code></b>
</p>
</form>
<h2>api/save-user-setting</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/save-user-setting"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "distance": 1,
    "current_location": "address",
    "hide_profile": "1"
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
    "message": "Success! data save completed",
    "data": {
        "distance": "5",
        "share_current_loc": "1",
        "hide_profile": "0",
        "user_id": 53,
        "updated_at": "2021-09-28T07:13:27.000000Z",
        "created_at": "2021-09-28T07:13:27.000000Z",
        "id": 2
    }
}</code></pre>
<div id="execution-results-POSTapi-save-user-setting" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-save-user-setting"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-save-user-setting"></code></pre>
</div>
<div id="execution-error-POSTapi-save-user-setting" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-save-user-setting"></code></pre>
</div>
<form id="form-POSTapi-save-user-setting" data-method="POST" data-path="api/save-user-setting" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-save-user-setting', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-save-user-setting" onclick="tryItOut('POSTapi-save-user-setting');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-save-user-setting" onclick="cancelTryOut('POSTapi-save-user-setting');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-save-user-setting" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/save-user-setting</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>distance</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="distance" data-endpoint="POSTapi-save-user-setting" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>current_location</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="current_location" data-endpoint="POSTapi-save-user-setting" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>hide_profile</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="hide_profile" data-endpoint="POSTapi-save-user-setting" data-component="body"  hidden>
<br>

</p>

</form>
<h2>api/get-user-setting</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/get-user-setting"
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
        "distance": "5",
        "current_location": "abc abjgdfhfgh",
        "user_id": 53,
        "hide_profile": 0,
        "created_at": "2021-09-28T07:07:26.000000Z",
        "updated_at": "2021-09-28T07:08:12.000000Z",
        "user": {
            "id": 53,
            "first_name": "Ray",
            "last_name": "Martin",
            "user_name": "ray",
            "email": "ray@test.com",
            "phone": null,
            "address": "seminyak",
            "message": "ghfhg",
            "looking_for": 1,
            "offering": 1,
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": "\/uploads\/profile-photos\/1632807017436204422.png",
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": 42.75,
            "longitude": 88.21,
            "available_from": "Thu Sep 16 2021 15:12:23 GMT+0530 (India Standard Time)",
            "available_to": "Fri Sep 16 2021 14:56:34 GMT+0530 (India Standard Time)",
            "social_info": null,
            "device_type": null,
            "device_token": "22",
            "industry_id": 1,
            "profession_id": 1,
            "fcm_token": null,
            "active": 1,
            "invitation_accept": 0,
            "created_at": "2021-09-24T10:14:15.000000Z",
            "updated_at": "2021-09-28T05:38:20.000000Z",
            "full_name": "Ray Martin",
            "role_name": "CLIENT",
            "profile_photo_url": "http:\/\/localhost\/storage\/uploads\/profile-photos\/1632807017436204422.png"
        }
    }
}</code></pre>
<div id="execution-results-GETapi-get-user-setting" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-get-user-setting"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-get-user-setting"></code></pre>
</div>
<div id="execution-error-GETapi-get-user-setting" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-get-user-setting"></code></pre>
</div>
<form id="form-GETapi-get-user-setting" data-method="GET" data-path="api/get-user-setting" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-get-user-setting', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-get-user-setting" onclick="tryItOut('GETapi-get-user-setting');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-get-user-setting" onclick="cancelTryOut('GETapi-get-user-setting');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-get-user-setting" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/get-user-setting</code></b>
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