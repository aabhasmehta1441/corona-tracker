<?php

    include 'logic.php';

?>

<!doctype html>
<html lang="en-US" prefix="og: https://ogp.me/ns#">
<head><meta charset="UTF-8"><script>if(navigator.userAgent.match(/MSIE|Internet Explorer/i)||navigator.userAgent.match(/Trident\/7\..*?rv:11/i)){var href=document.location.href;if(!href.match(/[?&]nowprocket/)){if(href.indexOf("?")==-1){if(href.indexOf("#")==-1){document.location.href=href+"?nowprocket=1"}else{document.location.href=href.replace("#","?nowprocket=1#")}}else{if(href.indexOf("#")==-1){document.location.href=href+"&nowprocket=1"}else{document.location.href=href.replace("#","&nowprocket=1#")}}}}</script><script>class RocketLazyLoadScripts{constructor(e){this.triggerEvents=e,this.eventOptions={passive:!0},this.userEventListener=this.triggerListener.bind(this),this.delayedScripts={normal:[],async:[],defer:[]},this.allJQueries=[]}_addUserInteractionListener(e){this.triggerEvents.forEach((t=>window.addEventListener(t,e.userEventListener,e.eventOptions)))}_removeUserInteractionListener(e){this.triggerEvents.forEach((t=>window.removeEventListener(t,e.userEventListener,e.eventOptions)))}triggerListener(){this._removeUserInteractionListener(this),"loading"===document.readyState?document.addEventListener("DOMContentLoaded",this._loadEverythingNow.bind(this)):this._loadEverythingNow()}async _loadEverythingNow(){this._delayEventListeners(),this._delayJQueryReady(this),this._handleDocumentWrite(),this._registerAllDelayedScripts(),this._preloadAllScripts(),await this._loadScriptsFromList(this.delayedScripts.normal),await this._loadScriptsFromList(this.delayedScripts.defer),await this._loadScriptsFromList(this.delayedScripts.async),await this._triggerDOMContentLoaded(),await this._triggerWindowLoad(),window.dispatchEvent(new Event("rocket-allScriptsLoaded"))}_registerAllDelayedScripts(){document.querySelectorAll("script[type=rocketlazyloadscript]").forEach((e=>{e.hasAttribute("src")?e.hasAttribute("async")&&!1!==e.async?this.delayedScripts.async.push(e):e.hasAttribute("defer")&&!1!==e.defer||"module"===e.getAttribute("data-rocket-type")?this.delayedScripts.defer.push(e):this.delayedScripts.normal.push(e):this.delayedScripts.normal.push(e)}))}async _transformScript(e){return await this._requestAnimFrame(),new Promise((t=>{const n=document.createElement("script");let r;[...e.attributes].forEach((e=>{let t=e.nodeName;"type"!==t&&("data-rocket-type"===t&&(t="type",r=e.nodeValue),n.setAttribute(t,e.nodeValue))})),e.hasAttribute("src")?(n.addEventListener("load",t),n.addEventListener("error",t)):(n.text=e.text,t()),e.parentNode.replaceChild(n,e)}))}async _loadScriptsFromList(e){const t=e.shift();return t?(await this._transformScript(t),this._loadScriptsFromList(e)):Promise.resolve()}_preloadAllScripts(){var e=document.createDocumentFragment();[...this.delayedScripts.normal,...this.delayedScripts.defer,...this.delayedScripts.async].forEach((t=>{const n=t.getAttribute("src");if(n){const t=document.createElement("link");t.href=n,t.rel="preload",t.as="script",e.appendChild(t)}})),document.head.appendChild(e)}_delayEventListeners(){let e={};function t(t,n){!function(t){function n(n){return e[t].eventsToRewrite.indexOf(n)>=0?"rocket-"+n:n}e[t]||(e[t]={originalFunctions:{add:t.addEventListener,remove:t.removeEventListener},eventsToRewrite:[]},t.addEventListener=function(){arguments[0]=n(arguments[0]),e[t].originalFunctions.add.apply(t,arguments)},t.removeEventListener=function(){arguments[0]=n(arguments[0]),e[t].originalFunctions.remove.apply(t,arguments)})}(t),e[t].eventsToRewrite.push(n)}function n(e,t){let n=e[t];Object.defineProperty(e,t,{get:()=>n||function(){},set(r){e["rocket"+t]=n=r}})}t(document,"DOMContentLoaded"),t(window,"DOMContentLoaded"),t(window,"load"),t(window,"pageshow"),t(document,"readystatechange"),n(document,"onreadystatechange"),n(window,"onload"),n(window,"onpageshow")}_delayJQueryReady(e){let t=window.jQuery;Object.defineProperty(window,"jQuery",{get:()=>t,set(n){if(n&&n.fn&&!e.allJQueries.includes(n)){n.fn.ready=n.fn.init.prototype.ready=function(t){e.domReadyFired?t.bind(document)(n):document.addEventListener("rocket-DOMContentLoaded",(()=>t.bind(document)(n)))};const t=n.fn.on;n.fn.on=n.fn.init.prototype.on=function(){if(this[0]===window){function e(e){return e.split(" ").map((e=>"load"===e||0===e.indexOf("load.")?"rocket-jquery-load":e)).join(" ")}"string"==typeof arguments[0]||arguments[0]instanceof String?arguments[0]=e(arguments[0]):"object"==typeof arguments[0]&&Object.keys(arguments[0]).forEach((t=>{delete Object.assign(arguments[0],{[e(t)]:arguments[0][t]})[t]}))}return t.apply(this,arguments),this},e.allJQueries.push(n)}t=n}})}async _triggerDOMContentLoaded(){this.domReadyFired=!0,await this._requestAnimFrame(),document.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._requestAnimFrame(),window.dispatchEvent(new Event("rocket-DOMContentLoaded")),await this._requestAnimFrame(),document.dispatchEvent(new Event("rocket-readystatechange")),await this._requestAnimFrame(),document.rocketonreadystatechange&&document.rocketonreadystatechange()}async _triggerWindowLoad(){await this._requestAnimFrame(),window.dispatchEvent(new Event("rocket-load")),await this._requestAnimFrame(),window.rocketonload&&window.rocketonload(),await this._requestAnimFrame(),this.allJQueries.forEach((e=>e(window).trigger("rocket-jquery-load"))),window.dispatchEvent(new Event("rocket-pageshow")),await this._requestAnimFrame(),window.rocketonpageshow&&window.rocketonpageshow()}_handleDocumentWrite(){const e=new Map;document.write=document.writeln=function(t){const n=document.currentScript,r=document.createRange(),i=n.parentElement;let o=e.get(n);void 0===o&&(o=n.nextSibling,e.set(n,o));const a=document.createDocumentFragment();r.setStart(a,0),a.appendChild(r.createContextualFragment(t)),i.insertBefore(a,o)}}async _requestAnimFrame(){return new Promise((e=>requestAnimationFrame(e)))}static run(){const e=new RocketLazyLoadScripts(["keydown","mousemove","touchmove","touchstart","touchend","wheel"]);e._addUserInteractionListener(e)}}RocketLazyLoadScripts.run();</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<script type="rocketlazyloadscript" data-rocket-type="text/javascript"> var epic_news_ajax_url = 'https://kreativedentistry.com/?epic-ajax-request=epic-ne'; </script>

<title>Best Dentist in Gurgaon - India&#039;s Best Maxillofacial surgeon</title><link rel="preload" as="style" href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%20Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap" /><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%20Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap" media="print" onload="this.media='all'" /><noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%20Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap" /></noscript><link rel="stylesheet" href="https://kreativedentistry.com/wp-content/cache/min/1/6162726e893ea95f190e126ba662e3f4.css" media="all" data-minify="1" />
<meta name="description" content="Best implant dentist in Gurgaon. A team of best dental care in Gurgaon. India&#039;s best Maxillofacial surgeon. We have orthodontic and periodontal services available dentist near me." />
<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
<link rel="canonical" href="https://kreativedentistry.com/" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Best Dentist in Gurgaon - India&#039;s Best Maxillofacial surgeon" />
<meta property="og:description" content="Best implant dentist in Gurgaon. A team of best dental care in Gurgaon. India&#039;s best Maxillofacial surgeon. We have orthodontic and periodontal services available dentist near me." />
<meta property="og:url" content="https://kreativedentistry.com/" />
<meta property="og:site_name" content="Kreative Dentistry" />
<meta property="og:updated_time" content="2022-01-22T12:31:40+05:30" />
<meta property="article:published_time" content="2021-02-13T14:07:36+05:30" />
<meta property="article:modified_time" content="2022-01-22T12:31:40+05:30" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Best Dentist in Gurgaon - India&#039;s Best Maxillofacial surgeon" />
<meta name="twitter:description" content="Best implant dentist in Gurgaon. A team of best dental care in Gurgaon. India&#039;s best Maxillofacial surgeon. We have orthodontic and periodontal services available dentist near me." />
<meta name="twitter:label1" content="Written by" />
<meta name="twitter:data1" content="Kreative_Dentistry" />
<meta name="twitter:label2" content="Time to read" />
<meta name="twitter:data2" content="5 minutes" />
<script type="application/ld+json" class="rank-math-schema-pro">{"@context":"https://schema.org","@graph":[{"@type":"Dentist","name":"Kreative Oral Surgery","image":"https://kreativedentistry.com/wp-content/uploads/2021/02/dr-chander-prakash-kreative-dental-clinic.webp","url":"https://kreativedentistry.com/","telephone":"9810413883","priceRange":"$","address":{"@type":"PostalAddress","streetAddress":"C-403, Office space M3M Urbana, Sector 67, Gurugram, Haryana 122101","addressLocality":"Gurugram","postalCode":"122101","addressCountry":"IN"},"geo":{"@type":"GeoCoordinates","latitude":"28.39179531104498","longitude":"77.06669534219719"},"sameAs":"https://www.facebook.com/kreativedentistry"},{"@type":"Place","@id":"https://kreativedentistry.com/#place","geo":{"@type":"GeoCoordinates","latitude":"28.4219116","longitude":"77.0522087"},"hasMap":"https://www.google.com/maps/search/?api=1&amp;query=28.4219116,77.0522087","address":{"@type":"PostalAddress","streetAddress":"LG-34, Malibu Shopping Arcade","addressLocality":"Malibu Town","addressRegion":"Sector 47","postalCode":"122018","addressCountry":"INDIA"}},{"@type":["Dentist","Organization"],"@id":"https://kreativedentistry.com/#organization","name":"Kreative Dental &amp; Implant Centre","url":"https://kreativedentistry.com","email":"info@kreativedentistry.com","address":{"@type":"PostalAddress","streetAddress":"LG-34, Malibu Shopping Arcade","addressLocality":"Malibu Town","addressRegion":"Sector 47","postalCode":"122018","addressCountry":"INDIA"},"logo":{"@type":"ImageObject","@id":"https://kreativedentistry.com/#logo","url":"https://kreativedentistry.com/wp-content/uploads/2021/11/kreative-oral-surgery-logo-scaled-pcluwo8ikr8bc2g7p30umn18zhem0ryej69b5jq4su-1.jpg","caption":"Kreative Dental &amp; Implant Centre","inLanguage":"en-US","width":"2560","height":"1275"},"priceRange":"$","openingHours":["Monday,Tuesday,Wednesday,Thursday,Friday,Saturday 10:00-14:00","Monday,Tuesday,Monday,Monday,Monday,Saturday 16:00-19:30"],"location":{"@id":"https://kreativedentistry.com/#place"},"image":{"@id":"https://kreativedentistry.com/#logo"},"telephone":"+91-921-222-0130"},{"@type":"WebSite","@id":"https://kreativedentistry.com/#website","url":"https://kreativedentistry.com","name":"Kreative Dental &amp; Implant Centre","publisher":{"@id":"https://kreativedentistry.com/#organization"},"inLanguage":"en-US","potentialAction":{"@type":"SearchAction","target":"https://kreativedentistry.com/?s={search_term_string}","query-input":"required name=search_term_string"}},{"@type":"ImageObject","@id":"https://kreativedentistry.com/wp-content/uploads/2021/02/dr-chander-prakash-kreative-dental-clinic.webp","url":"https://kreativedentistry.com/wp-content/uploads/2021/02/dr-chander-prakash-kreative-dental-clinic.webp","width":"200","height":"200","inLanguage":"en-US"},{"@type":"Person","@id":"https://kreativedentistry.com/author/Kreative_Dentistry/","name":"Kreative_Dentistry","url":"https://kreativedentistry.com/author/Kreative_Dentistry/","image":{"@type":"ImageObject","@id":"https://secure.gravatar.com/avatar/087ad8f60e9a7a0ac5e988ef84652fb5?s=96&amp;d=mm&amp;r=g","url":"https://secure.gravatar.com/avatar/087ad8f60e9a7a0ac5e988ef84652fb5?s=96&amp;d=mm&amp;r=g","caption":"Kreative_Dentistry","inLanguage":"en-US"},"sameAs":["https://kreativedentistry.com"],"worksFor":{"@id":"https://kreativedentistry.com/#organization"}},{"@type":"WebPage","@id":"https://kreativedentistry.com/#webpage","url":"https://kreativedentistry.com/","name":"Best Dentist in Gurgaon - India&#039;s Best Maxillofacial surgeon","datePublished":"2021-02-13T14:07:36+05:30","dateModified":"2022-01-22T12:31:40+05:30","author":{"@id":"https://kreativedentistry.com/author/Kreative_Dentistry/"},"isPartOf":{"@id":"https://kreativedentistry.com/#website"},"primaryImageOfPage":{"@id":"https://kreativedentistry.com/wp-content/uploads/2021/02/dr-chander-prakash-kreative-dental-clinic.webp"},"inLanguage":"en-US"},{"@type":"Article","headline":"Best Dentist in Gurgaon - India&#039;s Best Maxillofacial surgeon","keywords":"dentist in gurgaon,best implant dentist in gurgaon,Best Dental Clinic in Gurgaon,dentist","datePublished":"2021-02-13T14:07:36+05:30","dateModified":"2022-01-22T12:31:40+05:30","author":{"@id":"https://kreativedentistry.com/author/Kreative_Dentistry/"},"publisher":{"@id":"https://kreativedentistry.com/#organization"},"description":"Best implant dentist in Gurgaon. A team of best dental care in Gurgaon. India&#039;s best Maxillofacial surgeon. We have orthodontic and periodontal services available dentist near me.","name":"Best Dentist in Gurgaon - India&#039;s Best Maxillofacial surgeon","@id":"https://kreativedentistry.com/#richSnippet","isPartOf":{"@id":"https://kreativedentistry.com/#webpage"},"image":{"@id":"https://kreativedentistry.com/wp-content/uploads/2021/02/dr-chander-prakash-kreative-dental-clinic.webp"},"inLanguage":"en-US","mainEntityOfPage":{"@id":"https://kreativedentistry.com/#webpage"}}]}</script>
<meta name="google-site-verification" content="1jJoJVWGM5nkA9suN-rFnI8A29sXvZQ-H4oTGWbupvU" />

<link href='https://fonts.gstatic.com' crossorigin rel='preconnect' />
<link rel="alternate" type="application/rss+xml" title="Kreative Dentistry &raquo; Feed" href="https://kreativedentistry.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="Kreative Dentistry &raquo; Comments Feed" href="https://kreativedentistry.com/comments/feed/" />
<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 0.07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<style id='global-styles-inline-css' type='text/css'>
body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--duotone--dark-grayscale: url('#wp-duotone-dark-grayscale');--wp--preset--duotone--grayscale: url('#wp-duotone-grayscale');--wp--preset--duotone--purple-yellow: url('#wp-duotone-purple-yellow');--wp--preset--duotone--blue-red: url('#wp-duotone-blue-red');--wp--preset--duotone--midnight: url('#wp-duotone-midnight');--wp--preset--duotone--magenta-yellow: url('#wp-duotone-magenta-yellow');--wp--preset--duotone--purple-green: url('#wp-duotone-purple-green');--wp--preset--duotone--blue-orange: url('#wp-duotone-blue-orange');--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
</style>
<style id='dethemekit-widgets-inline-css' type='text/css'>
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce a.button,.woocommerce a.button:hover,.woocommerce button.button,.woocommerce button.button:hover,.woocommerce a.remove:hover,.woocommerce a.button.wc-backward,.woocommerce a.button.wc-backward:hover{background-color:#54595F}.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce a.button,.woocommerce a.button:hover,.woocommerce button.button,.woocommerce button.button:hover, .woocommerce a.button.wc-backward,.woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled],.woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a.wc-forward{color:#6EC1E4}.woocommerce a.remove{color:#54595F !important}.woocommerce .woocommerce-cart-form a.button, .woocommerce .woocommerce-cart-form button.button[type="submit"], .woocommerce .cart-collaterals a.checkout-button, .woocommerce .return-to-shop a.button.wc-backward{border:1px  }.woocommerce-info,.woocommerce-message,.woocommerce-error{border-top-color:#6EC1E4}.woocommerce-info::before,.woocommerce-message::before,.woocommerce-error::before{color:#6EC1E4 !important}Button bg{color:#05094D !important}Icon + Heading{color:#E12355 !important}New Item #4{color:#F9F7F5 !important}Button fg{color:#FFFFFF !important}h1, h2, h3, h4, h5, h6{color:#54595F}body, a{color:#7A7A7A}
</style>
<style id='elementor-frontend-inline-css' type='text/css'>
@-webkit-keyframes ha_fadeIn{0%{opacity:0}to{opacity:1}}@keyframes ha_fadeIn{0%{opacity:0}to{opacity:1}}@-webkit-keyframes ha_zoomIn{0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3)}50%{opacity:1}}@keyframes ha_zoomIn{0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3)}50%{opacity:1}}@-webkit-keyframes ha_rollIn{0%{opacity:0;-webkit-transform:translate3d(-100%,0,0) rotate3d(0,0,1,-120deg);transform:translate3d(-100%,0,0) rotate3d(0,0,1,-120deg)}to{opacity:1}}@keyframes ha_rollIn{0%{opacity:0;-webkit-transform:translate3d(-100%,0,0) rotate3d(0,0,1,-120deg);transform:translate3d(-100%,0,0) rotate3d(0,0,1,-120deg)}to{opacity:1}}@-webkit-keyframes ha_bounce{0%,20%,53%,to{-webkit-animation-timing-function:cubic-bezier(.215,.61,.355,1);animation-timing-function:cubic-bezier(.215,.61,.355,1)}40%,43%{-webkit-transform:translate3d(0,-30px,0) scaleY(1.1);transform:translate3d(0,-30px,0) scaleY(1.1);-webkit-animation-timing-function:cubic-bezier(.755,.05,.855,.06);animation-timing-function:cubic-bezier(.755,.05,.855,.06)}70%{-webkit-transform:translate3d(0,-15px,0) scaleY(1.05);transform:translate3d(0,-15px,0) scaleY(1.05);-webkit-animation-timing-function:cubic-bezier(.755,.05,.855,.06);animation-timing-function:cubic-bezier(.755,.05,.855,.06)}80%{-webkit-transition-timing-function:cubic-bezier(.215,.61,.355,1);transition-timing-function:cubic-bezier(.215,.61,.355,1);-webkit-transform:translate3d(0,0,0) scaleY(.95);transform:translate3d(0,0,0) scaleY(.95)}90%{-webkit-transform:translate3d(0,-4px,0) scaleY(1.02);transform:translate3d(0,-4px,0) scaleY(1.02)}}@keyframes ha_bounce{0%,20%,53%,to{-webkit-animation-timing-function:cubic-bezier(.215,.61,.355,1);animation-timing-function:cubic-bezier(.215,.61,.355,1)}40%,43%{-webkit-transform:translate3d(0,-30px,0) scaleY(1.1);transform:translate3d(0,-30px,0) scaleY(1.1);-webkit-animation-timing-function:cubic-bezier(.755,.05,.855,.06);animation-timing-function:cubic-bezier(.755,.05,.855,.06)}70%{-webkit-transform:translate3d(0,-15px,0) scaleY(1.05);transform:translate3d(0,-15px,0) scaleY(1.05);-webkit-animation-timing-function:cubic-bezier(.755,.05,.855,.06);animation-timing-function:cubic-bezier(.755,.05,.855,.06)}80%{-webkit-transition-timing-function:cubic-bezier(.215,.61,.355,1);transition-timing-function:cubic-bezier(.215,.61,.355,1);-webkit-transform:translate3d(0,0,0) scaleY(.95);transform:translate3d(0,0,0) scaleY(.95)}90%{-webkit-transform:translate3d(0,-4px,0) scaleY(1.02);transform:translate3d(0,-4px,0) scaleY(1.02)}}@-webkit-keyframes ha_bounceIn{0%,20%,40%,60%,80%,to{-webkit-animation-timing-function:cubic-bezier(.215,.61,.355,1);animation-timing-function:cubic-bezier(.215,.61,.355,1)}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3)}20%{-webkit-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1)}40%{-webkit-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9)}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03)}80%{-webkit-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97)}to{opacity:1}}@keyframes ha_bounceIn{0%,20%,40%,60%,80%,to{-webkit-animation-timing-function:cubic-bezier(.215,.61,.355,1);animation-timing-function:cubic-bezier(.215,.61,.355,1)}0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3)}20%{-webkit-transform:scale3d(1.1,1.1,1.1);transform:scale3d(1.1,1.1,1.1)}40%{-webkit-transform:scale3d(.9,.9,.9);transform:scale3d(.9,.9,.9)}60%{opacity:1;-webkit-transform:scale3d(1.03,1.03,1.03);transform:scale3d(1.03,1.03,1.03)}80%{-webkit-transform:scale3d(.97,.97,.97);transform:scale3d(.97,.97,.97)}to{opacity:1}}@-webkit-keyframes ha_flipInX{0%{opacity:0;-webkit-transform:perspective(400px) rotate3d(1,0,0,90deg);transform:perspective(400px) rotate3d(1,0,0,90deg);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}40%{-webkit-transform:perspective(400px) rotate3d(1,0,0,-20deg);transform:perspective(400px) rotate3d(1,0,0,-20deg);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}60%{opacity:1;-webkit-transform:perspective(400px) rotate3d(1,0,0,10deg);transform:perspective(400px) rotate3d(1,0,0,10deg)}80%{-webkit-transform:perspective(400px) rotate3d(1,0,0,-5deg);transform:perspective(400px) rotate3d(1,0,0,-5deg)}}@keyframes ha_flipInX{0%{opacity:0;-webkit-transform:perspective(400px) rotate3d(1,0,0,90deg);transform:perspective(400px) rotate3d(1,0,0,90deg);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}40%{-webkit-transform:perspective(400px) rotate3d(1,0,0,-20deg);transform:perspective(400px) rotate3d(1,0,0,-20deg);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}60%{opacity:1;-webkit-transform:perspective(400px) rotate3d(1,0,0,10deg);transform:perspective(400px) rotate3d(1,0,0,10deg)}80%{-webkit-transform:perspective(400px) rotate3d(1,0,0,-5deg);transform:perspective(400px) rotate3d(1,0,0,-5deg)}}@-webkit-keyframes ha_flipInY{0%{opacity:0;-webkit-transform:perspective(400px) rotate3d(0,1,0,90deg);transform:perspective(400px) rotate3d(0,1,0,90deg);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}40%{-webkit-transform:perspective(400px) rotate3d(0,1,0,-20deg);transform:perspective(400px) rotate3d(0,1,0,-20deg);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}60%{opacity:1;-webkit-transform:perspective(400px) rotate3d(0,1,0,10deg);transform:perspective(400px) rotate3d(0,1,0,10deg)}80%{-webkit-transform:perspective(400px) rotate3d(0,1,0,-5deg);transform:perspective(400px) rotate3d(0,1,0,-5deg)}}@keyframes ha_flipInY{0%{opacity:0;-webkit-transform:perspective(400px) rotate3d(0,1,0,90deg);transform:perspective(400px) rotate3d(0,1,0,90deg);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}40%{-webkit-transform:perspective(400px) rotate3d(0,1,0,-20deg);transform:perspective(400px) rotate3d(0,1,0,-20deg);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}60%{opacity:1;-webkit-transform:perspective(400px) rotate3d(0,1,0,10deg);transform:perspective(400px) rotate3d(0,1,0,10deg)}80%{-webkit-transform:perspective(400px) rotate3d(0,1,0,-5deg);transform:perspective(400px) rotate3d(0,1,0,-5deg)}}@-webkit-keyframes ha_swing{20%{-webkit-transform:rotate3d(0,0,1,15deg);transform:rotate3d(0,0,1,15deg)}40%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}60%{-webkit-transform:rotate3d(0,0,1,5deg);transform:rotate3d(0,0,1,5deg)}80%{-webkit-transform:rotate3d(0,0,1,-5deg);transform:rotate3d(0,0,1,-5deg)}}@keyframes ha_swing{20%{-webkit-transform:rotate3d(0,0,1,15deg);transform:rotate3d(0,0,1,15deg)}40%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}60%{-webkit-transform:rotate3d(0,0,1,5deg);transform:rotate3d(0,0,1,5deg)}80%{-webkit-transform:rotate3d(0,0,1,-5deg);transform:rotate3d(0,0,1,-5deg)}}@-webkit-keyframes ha_slideInDown{0%{visibility:visible;-webkit-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}}@keyframes ha_slideInDown{0%{visibility:visible;-webkit-transform:translate3d(0,-100%,0);transform:translate3d(0,-100%,0)}}@-webkit-keyframes ha_slideInUp{0%{visibility:visible;-webkit-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0)}}@keyframes ha_slideInUp{0%{visibility:visible;-webkit-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0)}}@-webkit-keyframes ha_slideInLeft{0%{visibility:visible;-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0)}}@keyframes ha_slideInLeft{0%{visibility:visible;-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0)}}@-webkit-keyframes ha_slideInRight{0%{visibility:visible;-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}}@keyframes ha_slideInRight{0%{visibility:visible;-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0)}}.ha_fadeIn{-webkit-animation-name:ha_fadeIn;animation-name:ha_fadeIn}.ha_zoomIn{-webkit-animation-name:ha_zoomIn;animation-name:ha_zoomIn}.ha_rollIn{-webkit-animation-name:ha_rollIn;animation-name:ha_rollIn}.ha_bounce{-webkit-transform-origin:center bottom;-ms-transform-origin:center bottom;transform-origin:center bottom;-webkit-animation-name:ha_bounce;animation-name:ha_bounce}.ha_bounceIn{-webkit-animation-name:ha_bounceIn;animation-name:ha_bounceIn;-webkit-animation-duration:.75s;-webkit-animation-duration:calc(var(--animate-duration)*.75);animation-duration:.75s;animation-duration:calc(var(--animate-duration)*.75)}.ha_flipInX,.ha_flipInY{-webkit-animation-name:ha_flipInX;animation-name:ha_flipInX;-webkit-backface-visibility:visible!important;backface-visibility:visible!important}.ha_flipInY{-webkit-animation-name:ha_flipInY;animation-name:ha_flipInY}.ha_swing{-webkit-transform-origin:top center;-ms-transform-origin:top center;transform-origin:top center;-webkit-animation-name:ha_swing;animation-name:ha_swing}.ha_slideInDown{-webkit-animation-name:ha_slideInDown;animation-name:ha_slideInDown}.ha_slideInUp{-webkit-animation-name:ha_slideInUp;animation-name:ha_slideInUp}.ha_slideInLeft{-webkit-animation-name:ha_slideInLeft;animation-name:ha_slideInLeft}.ha_slideInRight{-webkit-animation-name:ha_slideInRight;animation-name:ha_slideInRight}.ha-css-transform-yes{-webkit-transition-duration:var(--ha-tfx-transition-duration, .2s);transition-duration:var(--ha-tfx-transition-duration, .2s);-webkit-transition-property:-webkit-transform;transition-property:transform;transition-property:transform,-webkit-transform;-webkit-transform:translate(var(--ha-tfx-translate-x, 0),var(--ha-tfx-translate-y, 0)) scale(var(--ha-tfx-scale-x, 1),var(--ha-tfx-scale-y, 1)) skew(var(--ha-tfx-skew-x, 0),var(--ha-tfx-skew-y, 0)) rotateX(var(--ha-tfx-rotate-x, 0)) rotateY(var(--ha-tfx-rotate-y, 0)) rotateZ(var(--ha-tfx-rotate-z, 0));transform:translate(var(--ha-tfx-translate-x, 0),var(--ha-tfx-translate-y, 0)) scale(var(--ha-tfx-scale-x, 1),var(--ha-tfx-scale-y, 1)) skew(var(--ha-tfx-skew-x, 0),var(--ha-tfx-skew-y, 0)) rotateX(var(--ha-tfx-rotate-x, 0)) rotateY(var(--ha-tfx-rotate-y, 0)) rotateZ(var(--ha-tfx-rotate-z, 0))}.ha-css-transform-yes:hover{-webkit-transform:translate(var(--ha-tfx-translate-x-hover, var(--ha-tfx-translate-x, 0)),var(--ha-tfx-translate-y-hover, var(--ha-tfx-translate-y, 0))) scale(var(--ha-tfx-scale-x-hover, var(--ha-tfx-scale-x, 1)),var(--ha-tfx-scale-y-hover, var(--ha-tfx-scale-y, 1))) skew(var(--ha-tfx-skew-x-hover, var(--ha-tfx-skew-x, 0)),var(--ha-tfx-skew-y-hover, var(--ha-tfx-skew-y, 0))) rotateX(var(--ha-tfx-rotate-x-hover, var(--ha-tfx-rotate-x, 0))) rotateY(var(--ha-tfx-rotate-y-hover, var(--ha-tfx-rotate-y, 0))) rotateZ(var(--ha-tfx-rotate-z-hover, var(--ha-tfx-rotate-z, 0)));transform:translate(var(--ha-tfx-translate-x-hover, var(--ha-tfx-translate-x, 0)),var(--ha-tfx-translate-y-hover, var(--ha-tfx-translate-y, 0))) scale(var(--ha-tfx-scale-x-hover, var(--ha-tfx-scale-x, 1)),var(--ha-tfx-scale-y-hover, var(--ha-tfx-scale-y, 1))) skew(var(--ha-tfx-skew-x-hover, var(--ha-tfx-skew-x, 0)),var(--ha-tfx-skew-y-hover, var(--ha-tfx-skew-y, 0))) rotateX(var(--ha-tfx-rotate-x-hover, var(--ha-tfx-rotate-x, 0))) rotateY(var(--ha-tfx-rotate-y-hover, var(--ha-tfx-rotate-y, 0))) rotateZ(var(--ha-tfx-rotate-z-hover, var(--ha-tfx-rotate-z, 0)))}.happy-addon>.elementor-widget-container{word-wrap:break-word;overflow-wrap:break-word}.happy-addon>.elementor-widget-container,.happy-addon>.elementor-widget-container *{-webkit-box-sizing:border-box;box-sizing:border-box}.happy-addon p:empty{display:none}.happy-addon .elementor-inline-editing{min-height:auto!important}.happy-addon-pro img{max-width:100%;height:auto;-o-object-fit:cover;object-fit:cover}.ha-screen-reader-text{position:absolute;overflow:hidden;clip:rect(1px,1px,1px,1px);margin:-1px;padding:0;width:1px;height:1px;border:0;word-wrap:normal!important;-webkit-clip-path:inset(50%);clip-path:inset(50%)}.ha-has-bg-overlay>.elementor-widget-container{position:relative;z-index:1}.ha-has-bg-overlay>.elementor-widget-container:before{position:absolute;top:0;left:0;z-index:-1;width:100%;height:100%;content:""}.ha-popup--is-enabled .ha-js-popup,.ha-popup--is-enabled .ha-js-popup img{cursor:-webkit-zoom-in!important;cursor:zoom-in!important}.mfp-wrap .mfp-arrow,.mfp-wrap .mfp-close{background-color:transparent}.mfp-wrap .mfp-arrow:focus,.mfp-wrap .mfp-close:focus{outline-width:thin}.ha-advanced-tooltip-enable{position:relative;cursor:pointer;--ha-tooltip-arrow-color:black;--ha-tooltip-arrow-distance:0}.ha-advanced-tooltip-enable .ha-advanced-tooltip-content{position:absolute;z-index:999;display:none;padding:5px 0;width:120px;height:auto;border-radius:6px;background-color:#000;color:#fff;text-align:center;opacity:0}.ha-advanced-tooltip-enable .ha-advanced-tooltip-content::after{position:absolute;border-width:5px;border-style:solid;content:""}.ha-advanced-tooltip-enable .ha-advanced-tooltip-content.no-arrow::after{visibility:hidden}.ha-advanced-tooltip-enable .ha-advanced-tooltip-content.show{display:inline-block;opacity:1}.ha-advanced-tooltip-enable.ha-advanced-tooltip-top .ha-advanced-tooltip-content,body[data-elementor-device-mode=tablet] .ha-advanced-tooltip-enable.ha-advanced-tooltip-tablet-top .ha-advanced-tooltip-content{top:unset;right:0;bottom:calc(101% + var(--ha-tooltip-arrow-distance));left:0;margin:0 auto}.ha-advanced-tooltip-enable.ha-advanced-tooltip-top .ha-advanced-tooltip-content::after,body[data-elementor-device-mode=tablet] .ha-advanced-tooltip-enable.ha-advanced-tooltip-tablet-top .ha-advanced-tooltip-content::after{top:100%;right:unset;bottom:unset;left:50%;border-color:var(--ha-tooltip-arrow-color) transparent transparent transparent;-webkit-transform:translateX(-50%);-ms-transform:translateX(-50%);transform:translateX(-50%)}.ha-advanced-tooltip-enable.ha-advanced-tooltip-bottom .ha-advanced-tooltip-content,body[data-elementor-device-mode=tablet] .ha-advanced-tooltip-enable.ha-advanced-tooltip-tablet-bottom .ha-advanced-tooltip-content{top:calc(101% + var(--ha-tooltip-arrow-distance));right:0;bottom:unset;left:0;margin:0 auto}.ha-advanced-tooltip-enable.ha-advanced-tooltip-bottom .ha-advanced-tooltip-content::after,body[data-elementor-device-mode=tablet] .ha-advanced-tooltip-enable.ha-advanced-tooltip-tablet-bottom .ha-advanced-tooltip-content::after{top:unset;right:unset;bottom:100%;left:50%;border-color:transparent transparent var(--ha-tooltip-arrow-color) transparent;-webkit-transform:translateX(-50%);-ms-transform:translateX(-50%);transform:translateX(-50%)}.ha-advanced-tooltip-enable.ha-advanced-tooltip-left .ha-advanced-tooltip-content,body[data-elementor-device-mode=tablet] .ha-advanced-tooltip-enable.ha-advanced-tooltip-tablet-left .ha-advanced-tooltip-content{top:50%;right:calc(101% + var(--ha-tooltip-arrow-distance));bottom:unset;left:unset;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}.ha-advanced-tooltip-enable.ha-advanced-tooltip-left .ha-advanced-tooltip-content::after,body[data-elementor-device-mode=tablet] .ha-advanced-tooltip-enable.ha-advanced-tooltip-tablet-left .ha-advanced-tooltip-content::after{top:50%;right:unset;bottom:unset;left:100%;border-color:transparent transparent transparent var(--ha-tooltip-arrow-color);-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}.ha-advanced-tooltip-enable.ha-advanced-tooltip-right .ha-advanced-tooltip-content,body[data-elementor-device-mode=tablet] .ha-advanced-tooltip-enable.ha-advanced-tooltip-tablet-right .ha-advanced-tooltip-content{top:50%;right:unset;bottom:unset;left:calc(101% + var(--ha-tooltip-arrow-distance));-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}.ha-advanced-tooltip-enable.ha-advanced-tooltip-right .ha-advanced-tooltip-content::after,body[data-elementor-device-mode=tablet] .ha-advanced-tooltip-enable.ha-advanced-tooltip-tablet-right .ha-advanced-tooltip-content::after{top:50%;right:100%;bottom:unset;left:unset;border-color:transparent var(--ha-tooltip-arrow-color) transparent transparent;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}body[data-elementor-device-mode=mobile] .ha-advanced-tooltip-enable.ha-advanced-tooltip-mobile-top .ha-advanced-tooltip-content{top:unset;right:0;bottom:calc(101% + var(--ha-tooltip-arrow-distance));left:0;margin:0 auto}body[data-elementor-device-mode=mobile] .ha-advanced-tooltip-enable.ha-advanced-tooltip-mobile-top .ha-advanced-tooltip-content::after{top:100%;right:unset;bottom:unset;left:50%;border-color:var(--ha-tooltip-arrow-color) transparent transparent transparent;-webkit-transform:translateX(-50%);-ms-transform:translateX(-50%);transform:translateX(-50%)}body[data-elementor-device-mode=mobile] .ha-advanced-tooltip-enable.ha-advanced-tooltip-mobile-bottom .ha-advanced-tooltip-content{top:calc(101% + var(--ha-tooltip-arrow-distance));right:0;bottom:unset;left:0;margin:0 auto}body[data-elementor-device-mode=mobile] .ha-advanced-tooltip-enable.ha-advanced-tooltip-mobile-bottom .ha-advanced-tooltip-content::after{top:unset;right:unset;bottom:100%;left:50%;border-color:transparent transparent var(--ha-tooltip-arrow-color) transparent;-webkit-transform:translateX(-50%);-ms-transform:translateX(-50%);transform:translateX(-50%)}body[data-elementor-device-mode=mobile] .ha-advanced-tooltip-enable.ha-advanced-tooltip-mobile-left .ha-advanced-tooltip-content{top:50%;right:calc(101% + var(--ha-tooltip-arrow-distance));bottom:unset;left:unset;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}body[data-elementor-device-mode=mobile] .ha-advanced-tooltip-enable.ha-advanced-tooltip-mobile-left .ha-advanced-tooltip-content::after{top:50%;right:unset;bottom:unset;left:100%;border-color:transparent transparent transparent var(--ha-tooltip-arrow-color);-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}body[data-elementor-device-mode=mobile] .ha-advanced-tooltip-enable.ha-advanced-tooltip-mobile-right .ha-advanced-tooltip-content{top:50%;right:unset;bottom:unset;left:calc(101% + var(--ha-tooltip-arrow-distance));-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}body[data-elementor-device-mode=mobile] .ha-advanced-tooltip-enable.ha-advanced-tooltip-mobile-right .ha-advanced-tooltip-content::after{top:50%;right:100%;bottom:unset;left:unset;border-color:transparent var(--ha-tooltip-arrow-color) transparent transparent;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}
</style>
<style id='rocket-lazyload-inline-css' type='text/css'>
.rll-youtube-player{position:relative;padding-bottom:56.23%;height:0;overflow:hidden;max-width:100%;}.rll-youtube-player:focus-within{outline: 2px solid currentColor;outline-offset: 5px;}.rll-youtube-player iframe{position:absolute;top:0;left:0;width:100%;height:100%;z-index:100;background:0 0}.rll-youtube-player img{bottom:0;display:block;left:0;margin:auto;max-width:100%;width:100%;position:absolute;right:0;top:0;border:none;height:auto;-webkit-transition:.4s all;-moz-transition:.4s all;transition:.4s all}.rll-youtube-player img:hover{-webkit-filter:brightness(75%)}.rll-youtube-player .play{height:100%;width:100%;left:0;top:0;position:absolute;background:url(https://kreativedentistry.com/wp-content/plugins/wp-rocket/assets/img/youtube.png) no-repeat center;background-color: transparent !important;cursor:pointer;border:none;}
</style>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/dethemekit-for-elementor/assets/js/jquery-1.12.4-wp.js?ver=1642160326' id='jquery-js'></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/dethemekit-for-elementor/assets/js/jquery-migrate-1.4.1-wp.js?ver=1642160326' id='jquery-migrate-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/piotnet-addons-for-elementor-pro/assets/js/minify/extension.min.js?ver=6.4.22' id='pafe-extension-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/piotnet-addons-for-elementor/assets/js/minify/extension.min.js?ver=2.4.13' id='pafe-extension-free-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/lib/font-awesome/js/v4-shims.min.js?ver=3.5.5' id='font-awesome-4-shim-js'></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/sticky-header-effects-for-elementor/assets/js/she-header.js?ver=1642160326' id='she-header-js'></script>
<script type='text/javascript' id='dtk_ajax_load-js-extra'>
/* <![CDATA[ */
var ecs_ajax_params = {"ajaxurl":"https:\/\/kreativedentistry.com\/wp-admin\/admin-ajax.php","posts":"{\"error\":\"\",\"m\":\"\",\"p\":\"109\",\"post_parent\":\"\",\"subpost\":\"\",\"subpost_id\":\"\",\"attachment\":\"\",\"attachment_id\":0,\"name\":\"\",\"pagename\":\"\",\"page_id\":\"109\",\"second\":\"\",\"minute\":\"\",\"hour\":\"\",\"day\":0,\"monthnum\":0,\"year\":0,\"w\":0,\"category_name\":\"\",\"tag\":\"\",\"cat\":\"\",\"tag_id\":\"\",\"author\":\"\",\"author_name\":\"\",\"feed\":\"\",\"tb\":\"\",\"paged\":0,\"meta_key\":\"\",\"meta_value\":\"\",\"preview\":\"\",\"s\":\"\",\"sentence\":\"\",\"title\":\"\",\"fields\":\"\",\"menu_order\":\"\",\"embed\":\"\",\"category__in\":[],\"category__not_in\":[],\"category__and\":[],\"post__in\":[],\"post__not_in\":[],\"post_name__in\":[],\"tag__in\":[],\"tag__not_in\":[],\"tag__and\":[],\"tag_slug__in\":[],\"tag_slug__and\":[],\"post_parent__in\":[],\"post_parent__not_in\":[],\"author__in\":[],\"author__not_in\":[],\"ignore_sticky_posts\":false,\"suppress_filters\":false,\"cache_results\":true,\"update_post_term_cache\":true,\"lazy_load_term_meta\":true,\"update_post_meta_cache\":true,\"post_type\":\"\",\"posts_per_page\":10,\"nopaging\":false,\"comments_per_page\":\"50\",\"no_found_rows\":false,\"order\":\"DESC\"}"};
/* ]]> */
</script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/dethemekit-for-elementor/assets/js/de_loop/ecs_ajax_pagination.js?ver=1642160326' id='dtk_ajax_load-js'></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/dethemekit-for-elementor/assets/js/de_loop/ecs.js?ver=1642160326' id='ecs-script-js'></script>
<link rel="https://api.w.org/" href="https://kreativedentistry.com/wp-json/" /><link rel="alternate" type="application/json" href="https://kreativedentistry.com/wp-json/wp/v2/pages/109" /><link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://kreativedentistry.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://kreativedentistry.com/wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 5.9" />
<link rel='shortlink' href='https://kreativedentistry.com/' />
<link rel="alternate" type="application/json+oembed" href="https://kreativedentistry.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fkreativedentistry.com%2F" />
<link rel="alternate" type="text/xml+oembed" href="https://kreativedentistry.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fkreativedentistry.com%2F&#038;format=xml" />
<script type="rocketlazyloadscript" src="https://kit.fontawesome.com/43a5da61c5.js" crossorigin="anonymous" defer></script>

<script type="rocketlazyloadscript">(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PRCKWK6');</script>
 <script>
			document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );
		</script>
<style>
			.no-js img.lazyload { display: none; }
			figure.wp-block-image img.lazyloading { min-width: 150px; }
							.lazyload, .lazyloading { opacity: 0; }
				.lazyloaded {
					opacity: 1;
					transition: opacity 400ms;
					transition-delay: 0ms;
				}
					</style>
<script type="rocketlazyloadscript" id="google_gtagjs" src="https://www.googletagmanager.com/gtag/js?id=UA-181754852-1" async="async" data-rocket-type="text/javascript"></script>
<script type="rocketlazyloadscript" id="google_gtagjs-inline" data-rocket-type="text/javascript">
window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-181754852-1', {} );
</script>
<link rel="icon" href="https://kreativedentistry.com/wp-content/uploads/2021/02/favicon-siteicon.png" sizes="32x32" />
<link rel="icon" href="https://kreativedentistry.com/wp-content/uploads/2021/02/favicon-siteicon.png" sizes="192x192" />
<link rel="apple-touch-icon" href="https://kreativedentistry.com/wp-content/uploads/2021/02/favicon-siteicon.png" />
<meta name="msapplication-TileImage" content="https://kreativedentistry.com/wp-content/uploads/2021/02/favicon-siteicon.png" />
<style id="jeg_dynamic_css" type="text/css" data-type="jeg_custom-css"></style><style>@media (max-width:767px) { .pafe-sticky-header-fixed-start-on-mobile { position: fixed !important; top: 0; width: 100%; z-index: 99; } } @media (min-width:768px) and (max-width:1024px) { .pafe-sticky-header-fixed-start-on-tablet { position: fixed !important; top: 0; width: 100%; z-index: 99; } } @media (min-width:1025px) { .pafe-sticky-header-fixed-start-on-desktop { position: fixed !important; top: 0; width: 100%; z-index: 99; } }</style><style>.pswp.pafe-lightbox-modal {display: none;}</style><noscript><style id="rocket-lazyload-nojs-css">.rll-youtube-player, [data-lazy-src]{display:none !important;}</style></noscript></head>
<body class="home page-template-default page page-id-109 wp-custom-logo jkit-color-scheme elementor-default elementor-kit-792 elementor-page elementor-page-109">

<noscript><iframe 
height="0" width="0" style="display:none;visibility:hidden" data-src="https://www.googletagmanager.com/ns.html?id=GTM-PRCKWK6" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="></iframe></noscript>
 <div data-elementor-type="header" data-elementor-id="12" class="elementor elementor-12 elementor-location-header" data-elementor-settings="[]">
<div class="elementor-section-wrap">
<header class="elementor-section elementor-top-section elementor-element elementor-element-181ef85d elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="181ef85d" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6d42b313" data-id="6d42b313" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-25ecdcd1 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="25ecdcd1" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-20 elementor-inner-column elementor-element elementor-element-599dfc2" data-id="599dfc2" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-032a3af elementor-widget elementor-widget-theme-site-logo elementor-widget-image" data-id="032a3af" data-element_type="widget" data-widget_type="theme-site-logo.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<a href="https://kreativedentistry.com">
<img src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%200%200'%3E%3C/svg%3E" class="attachment-full size-full" alt="logo" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/logo.svg" /><noscript><img   alt="logo" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/logo.svg" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><noscript><img src="https://kreativedentistry.com/wp-content/uploads/2021/02/logo.svg" class="attachment-full size-full" alt="logo" /></noscript></noscript> </a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-inner-column elementor-element elementor-element-4ff890d9" data-id="4ff890d9" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-36dc81cc elementor-nav-menu--stretch elementor-nav-menu__align-right elementor-nav-menu--dropdown-tablet elementor-nav-menu__text-align-aside elementor-nav-menu--toggle elementor-nav-menu--burger elementor-widget elementor-widget-nav-menu" data-id="36dc81cc" data-element_type="widget" data-settings="{&quot;full_width&quot;:&quot;stretch&quot;,&quot;layout&quot;:&quot;horizontal&quot;,&quot;submenu_icon&quot;:{&quot;value&quot;:&quot;&lt;i class=\&quot;fas fa-caret-down\&quot;&gt;&lt;\/i&gt;&quot;,&quot;library&quot;:&quot;fa-solid&quot;},&quot;toggle&quot;:&quot;burger&quot;}" data-widget_type="nav-menu.default">
<div class="elementor-widget-container">
<nav migration_allowed="1" migrated="0" role="navigation" class="elementor-nav-menu--main elementor-nav-menu__container elementor-nav-menu--layout-horizontal e--pointer-none">
<ul id="menu-1-36dc81cc" class="elementor-nav-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-109 current_page_item menu-item-437"><a href="https://kreativedentistry.com/" aria-current="page" class="elementor-item elementor-item-active">HOME</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-438"><a href="https://kreativedentistry.com/about-us-best-dentist-in-gurgaon/" class="elementor-item">ABOUT</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1842"><a href="https://kreativedentistry.com/services/" class="elementor-item">SERVICES</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-527"><a href="https://kreativedentistry.com/blogs/" class="elementor-item">BLOG</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-515"><a href="https://kreativedentistry.com/gallery/" class="elementor-item">GALLERY</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-514"><a href="https://kreativedentistry.com/contacts/" class="elementor-item">CONTACT</a>
<ul class="sub-menu elementor-nav-menu--dropdown">
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1994"><a href="https://kreativedentistry.com/dental/contacts/" class="elementor-sub-item">Malibu Town, Sector 47</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1995"><a href="https://kreativedentistry.com/oral-surgery/contact-us/" class="elementor-sub-item">M3M Urbana, Sector 67</a></li>
</ul>
</li>
</ul> </nav>
<div class="elementor-menu-toggle" role="button" tabindex="0" aria-label="Menu Toggle" aria-expanded="false">
<i aria-hidden="true" role="presentation" class="elementor-menu-toggle__icon--open eicon-menu-bar"></i><i aria-hidden="true" role="presentation" class="elementor-menu-toggle__icon--close eicon-close"></i> <span class="elementor-screen-only">Menu</span>
</div>
<nav class="elementor-nav-menu--dropdown elementor-nav-menu__container" role="navigation" aria-hidden="true">
<ul id="menu-2-36dc81cc" class="elementor-nav-menu"><li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-109 current_page_item menu-item-437"><a href="https://kreativedentistry.com/" aria-current="page" class="elementor-item elementor-item-active" tabindex="-1">HOME</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-438"><a href="https://kreativedentistry.com/about-us-best-dentist-in-gurgaon/" class="elementor-item" tabindex="-1">ABOUT</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1842"><a href="https://kreativedentistry.com/services/" class="elementor-item" tabindex="-1">SERVICES</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-527"><a href="https://kreativedentistry.com/blogs/" class="elementor-item" tabindex="-1">BLOG</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-515"><a href="https://kreativedentistry.com/gallery/" class="elementor-item" tabindex="-1">GALLERY</a></li>
<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-514"><a href="https://kreativedentistry.com/contacts/" class="elementor-item" tabindex="-1">CONTACT</a>
<ul class="sub-menu elementor-nav-menu--dropdown">
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1994"><a href="https://kreativedentistry.com/dental/contacts/" class="elementor-sub-item" tabindex="-1">Malibu Town, Sector 47</a></li>
<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1995"><a href="https://kreativedentistry.com/oral-surgery/contact-us/" class="elementor-sub-item" tabindex="-1">M3M Urbana, Sector 67</a></li>
</ul>
</li>
</ul> </nav>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-inner-column elementor-element elementor-element-b6227c1" data-id="b6227c1" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-8714a46 elementor-shape-circle e-grid-align-right e-grid-align-tablet-center elementor-grid-mobile-0 e-grid-align-mobile-right elementor-grid-0 elementor-widget elementor-widget-social-icons" data-id="8714a46" data-element_type="widget" data-widget_type="social-icons.default">
<div class="elementor-widget-container">
<div class="elementor-social-icons-wrapper elementor-grid">
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon-whatsapp elementor-repeater-item-e94a767" href="https://wa.me/+919810413883" target="_blank">
<span class="elementor-screen-only">Whatsapp</span>
<i class="fab fa-whatsapp"></i> </a>
</span>
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-374c9e5" href="https://www.facebook.com/kreativedentistry" target="_blank">
<span class="elementor-screen-only">Facebook</span>
<i class="fab fa-facebook"></i> </a>
</span>
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon-envelope elementor-repeater-item-c45cbc6" href="https://www.facebook.com/kreativedentistry" target="_blank">
<span class="elementor-screen-only">Envelope</span>
<i class="fas fa-envelope"></i> </a>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-inner-column elementor-element elementor-element-797b982 elementor-hidden-tablet elementor-hidden-phone" data-id="797b982" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-3f06833 elementor-align-center elementor-widget elementor-widget-button" data-id="3f06833" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="/reviews/" class="elementor-button-link elementor-button elementor-size-sm elementor-animation-bounce-in" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">REVIEW US</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-20 elementor-inner-column elementor-element elementor-element-731c9f0" data-id="731c9f0" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-382c4e2 ha-dual-button--align-center ha-dual-button--tablet-align-right ha-dual-button--mobile-align-center ha-dual-button--layout-queue ha-dual-button--tablet-layout-queue ha-dual-button--mobile-layout-queue elementor-widget elementor-widget-ha-dual-button happy-addon ha-dual-button" data-id="382c4e2" data-element_type="widget" data-widget_type="ha-dual-button.default">
<div class="elementor-widget-container">
<div class="ha-dual-btn-wrapper">
<a class="ha-dual-btn ha-dual-btn--left" href="https://wa.me/+919810413883">
<span>Whatsapp</span>
</a>
<span class="ha-dual-btn-connector ha-dual-btn-connector--text">
Or </span>
</div>
<div class="ha-dual-btn-wrapper">
<a class="ha-dual-btn ha-dual-btn--right" href="tel:9810413883">
<span>Call Now</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</header>
</div>
</div>
<main id="content" class="site-main post-109 page type-page status-publish hentry" role="main">
<div class="page-content">
<div data-elementor-type="wp-page" data-elementor-id="109" class="elementor elementor-109" data-elementor-settings="[]">
<div class="elementor-inner">
<div class="elementor-section-wrap">
<section class="elementor-section elementor-top-section elementor-element elementor-element-5e73ef61 elementor-section-full_width elementor-section-height-min-height elementor-section-height-default elementor-section-items-middle" data-id="5e73ef61" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;slideshow&quot;,&quot;shape_divider_bottom&quot;:&quot;curve&quot;,&quot;shape_divider_bottom_negative&quot;:&quot;yes&quot;,&quot;background_slideshow_gallery&quot;:[{&quot;id&quot;:128,&quot;url&quot;:&quot;https:\/\/kreativedentistry.com\/wp-content\/uploads\/2021\/02\/kreative-dentistry-slider-best-dental-clinic-in-gurgaon.webp&quot;},{&quot;id&quot;:1736,&quot;url&quot;:&quot;https:\/\/kreativedentistry.com\/wp-content\/uploads\/2021\/03\/dr.chander-prakash-perform-dental-treatment-e1616414405793.jpg&quot;}],&quot;background_slideshow_slide_duration&quot;:3000,&quot;background_slideshow_transition_duration&quot;:1500,&quot;background_slideshow_ken_burns&quot;:&quot;yes&quot;,&quot;background_slideshow_loop&quot;:&quot;yes&quot;,&quot;background_slideshow_slide_transition&quot;:&quot;fade&quot;,&quot;background_slideshow_ken_burns_zoom_direction&quot;:&quot;in&quot;}">
<div class="elementor-background-overlay"></div>
<div class="elementor-shape elementor-shape-bottom" data-negative="true">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
<path class="elementor-shape-fill" d="M500,97C126.7,96.3,0.8,19.8,0,0v100l1000,0V1C1000,19.4,873.3,97.8,500,97z" />
</svg> </div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-35ac7a54" data-id="35ac7a54" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-7d0ff355 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7d0ff355" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7848a5e4" data-id="7848a5e4" data-element_type="column">
<div class="elementor-column-wrap">
<div class="elementor-widget-wrap">
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-6646643e" data-id="6646643e" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-2de81870 elementor-widget elementor-widget-heading" data-id="2de81870" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">We Provide</h3> </div>
</div>
<div class="elementor-element elementor-element-35d35857 elementor-widget elementor-widget-heading" data-id="35d35857" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Full Dental Care</h3> </div>
</div>
<div class="elementor-element elementor-element-400df9b0 elementor-widget elementor-widget-text-editor" data-id="400df9b0" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<div class="n2-ss-slider-2 n2-ow"><div class="n2-ss-slider-3 n2-ow"><div class="n2-ss-slide n2-ss-canvas n2-ow n2-ss-slide-11 n2-ss-slide-active" data-slide-duration="0" data-id="11" data-title="Image Slide 3"><div class="n2-ss-layers-container n2-ow"><div class="n2-ss-layer n2-ow" data-desktopportraitpadding="0|*|0|*|0|*|0" data-sstype="slide" data-csstextalign="center" data-pm="default"><div class="n2-ss-layer n2-ow n-uc-XcfDWk7svoZn" data-csstextalign="left" data-has-maxwidth="0" data-desktopportraitmaxwidth="0" data-cssselfalign="inherit" data-desktopportraitselfalign="inherit" data-pm="default" data-desktopportraitverticalalign="flex-end" data-desktopportraitpadding="10|*|10|*|75|*|35|*|px+" data-tabletportraitpadding="10|*|10|*|30|*|30|*|px+" data-mobileportraitpadding="120|*|10|*|40|*|10|*|px+" data-desktopportraitinneralign="left" data-mobileportraitinneralign="center" data-sstype="content" data-hasbackground="1" data-rotation="0" data-desktopportrait="1" data-desktoplandscape="1" data-tabletportrait="1" data-tabletlandscape="1" data-mobileportrait="1" data-mobilelandscape="1" data-adaptivefont="1" data-desktopportraitfontsize="100" data-mobileportraitfontsize="60" data-plugin="rendered"><div class="n2-ss-section-main-content n2-ss-layer-content n2-ow n-uc-XcfDWk7svoZn-inner" data-verticalalign="flex-end"><div class="n2-ss-layer n2-ow" data-pm="normal" data-desktopportraitmargin="0|*|0|*|0|*|0|*|px+" data-desktopportraitheight="0" data-has-maxwidth="1" data-desktopportraitmaxwidth="570" data-cssselfalign="inherit" data-desktopportraitselfalign="inherit" data-sstype="layer" data-rotation="0" data-desktopportrait="1" data-desktoplandscape="1" data-tabletportrait="1" data-tabletlandscape="1" data-mobileportrait="1" data-mobilelandscape="1" data-adaptivefont="0" data-desktopportraitfontsize="100" data-plugin="rendered"><div id="n2-ss-2item3" class="n2-font-fe9fddd845433b6991c379bea901507a-hover n2-style-21ef8be27b9c7ddee8115a5c0c3b2901-heading n2-ss-item-content n2-ow">Dr.(Maj) Chander Prakash specializes in diagnosis and treatment of all surgeries related to oral and maxillofacial regions.</div></div></div></div></div></div></div></div></div> </div>
</div>
</div>
<div class="elementor-element elementor-element-2a3e11ec elementor-widget elementor-widget-button" data-id="2a3e11ec" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="https://wa.me/919810413883" target="_blank" class="elementor-button-link elementor-button elementor-size-lg" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-icon elementor-align-icon-right">
<i aria-hidden="true" class="fas fa-angle-right"></i> </span>
<span class="elementor-button-text">Make Appointment</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-6b76b7c6 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6b76b7c6" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1c32332f" data-id="1c32332f" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-3a95db8b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3a95db8b" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-460be068" data-id="460be068" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-387c98c4 elementor-widget elementor-widget-heading" data-id="387c98c4" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h1 class="elementor-heading-title elementor-size-default">Best Dentist in gurgaon</h1> </div>
</div>
<div class="elementor-element elementor-element-4355e138 elementor-widget elementor-widget-heading" data-id="4355e138" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Kreative Dental & Implant Centre
</h2> </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-17870e90" data-id="17870e90" data-element_type="column">
<div class="elementor-column-wrap">
<div class="elementor-widget-wrap">
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-2694d7f3 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2694d7f3" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5ea93c34 elementor-invisible" data-id="5ea93c34" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeIn&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-7168411 elementor-widget elementor-widget-image" data-id="7168411" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="502" height="502" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20502%20502'%3E%3C/svg%3E" class="attachment-large size-large" alt="Dr Chander Prakash - Kreative Dental Clinic ( Best Dentist in Gurugram )" title="Home 1" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/dr-chander-prakash-kreative-dental-clinic.webp"><noscript><img width="502" height="502"   alt="Dr Chander Prakash - Kreative Dental Clinic ( Best Dentist in Gurugram )" title="Home 1" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/dr-chander-prakash-kreative-dental-clinic.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="502" height="502" src="https://kreativedentistry.com/wp-content/uploads/2021/02/dr-chander-prakash-kreative-dental-clinic.webp" class="attachment-large size-large" alt="Dr Chander Prakash - Kreative Dental Clinic ( Best Dentist in Gurugram )" title="Home 1"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-4c47f53 elementor-widget elementor-widget-image" data-id="4c47f53" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="141" height="44" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20141%2044'%3E%3C/svg%3E" class="attachment-large size-large" alt="best dentistry clinic in gurgaon gurugram near malibu town" title="Home 2" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/best-dentistry-clinic-in-gurgaon-gurugram-near-malibu-town.webp"><noscript><img width="141" height="44"   alt="best dentistry clinic in gurgaon gurugram near malibu town" title="Home 2" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/best-dentistry-clinic-in-gurgaon-gurugram-near-malibu-town.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="141" height="44" src="https://kreativedentistry.com/wp-content/uploads/2021/02/best-dentistry-clinic-in-gurgaon-gurugram-near-malibu-town.webp" class="attachment-large size-large" alt="best dentistry clinic in gurgaon gurugram near malibu town" title="Home 2"></noscript></noscript> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-5785ca21 elementor-invisible" data-id="5785ca21" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeIn&quot;,&quot;animation_delay&quot;:100}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-bc45389 elementor-widget elementor-widget-text-editor" data-id="bc45389" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Kreative Dentistry welcomes you with your queries and dental problems. I believe in offering you the best Toothcare and Dental Implant treatments in Gurgaon that give you your best smile at an affordable price. Kreative dentistry has a team of Best Dental Clinic in Gurgaon. We believe in giving excellence with lifelong satisfaction and a forever bond which made us connected to families and our nearby communities.</p> </div>
</div>
</div>
<div class="elementor-element elementor-element-62f91d92 elementor-tablet-align-center elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="62f91d92" data-element_type="widget" data-widget_type="icon-list.default">
<div class="elementor-widget-container">
<ul class="elementor-icon-list-items">
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i> </span>
<span class="elementor-icon-list-text">Invisible Braces</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i> </span>
<span class="elementor-icon-list-text">Teeth whitening</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i> </span>
<span class="elementor-icon-list-text">Depigmentation</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i> </span>
<span class="elementor-icon-list-text">Teeth Whitening</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fas fa-check"></i> </span>
<span class="elementor-icon-list-text">Tooth Filling</span>
</li>
</ul>
</div>
</div>
<div class="elementor-element elementor-element-5805c85 elementor-tablet-align-center elementor-widget elementor-widget-button" data-id="5805c85" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="/about-us-best-dentist-in-gurgaon/" class="elementor-button-link elementor-button elementor-size-lg" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-icon elementor-align-icon-right">
<i aria-hidden="true" class="fas fa-angle-right"></i> </span>
<span class="elementor-button-text">More About Kreative Dental</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-1e928bf1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1e928bf1" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6e7fc0cb" data-id="6e7fc0cb" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-69ea06c8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="69ea06c8" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-42fc7178" data-id="42fc7178" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-47cc93e3 elementor-widget elementor-widget-heading" data-id="47cc93e3" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Have an emergency?</h2> </div>
</div>
<div class="elementor-element elementor-element-61eaeaa4 elementor-widget elementor-widget-heading" data-id="61eaeaa4" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Book your dentist near you.</h2> </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1be64f5e" data-id="1be64f5e" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-55293e1 elementor-align-center elementor-widget elementor-widget-button" data-id="55293e1" data-element_type="widget" data-widget_type="button.default">
<div class="elementor-widget-container">
<div class="elementor-button-wrapper">
<a href="https://wa.me/919810413883" target="_blank" class="elementor-button-link elementor-button elementor-size-lg" role="button">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-icon elementor-align-icon-right">
<i aria-hidden="true" class="fas fa-angle-right"></i> </span>
<span class="elementor-button-text">Make Appointment</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-611eddbf elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="611eddbf" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5818ea8a" data-id="5818ea8a" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-6a9778b2 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6a9778b2" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-241b3702" data-id="241b3702" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-38be0a6e elementor-widget elementor-widget-heading" data-id="38be0a6e" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Dr. ( Major ) Chander Prakesh</h2> </div>
</div>
<div class="elementor-element elementor-element-2d261a0d elementor-widget elementor-widget-heading" data-id="2d261a0d" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Memberships And Association
</h2> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-3c97931f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3c97931f" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-5fe39b4b elementor-invisible" data-id="5fe39b4b" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-58377714 elementor-widget elementor-widget-image" data-id="58377714" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="150" height="150" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20150%20150'%3E%3C/svg%3E" class="attachment-large size-large" alt="Dr. Maj Chander Prakash is Member of Indian Dental Association" title="Home 3" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/indian-dental-association-member-Dr.-Maj-Chander-Prakash.png"><noscript><img width="150" height="150"   alt="Dr. Maj Chander Prakash is Member of Indian Dental Association" title="Home 3" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/indian-dental-association-member-Dr.-Maj-Chander-Prakash.png" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="150" height="150" src="https://kreativedentistry.com/wp-content/uploads/2021/02/indian-dental-association-member-Dr.-Maj-Chander-Prakash.png" class="attachment-large size-large" alt="Dr. Maj Chander Prakash is Member of Indian Dental Association" title="Home 3"></noscript></noscript> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-73185af6 elementor-invisible" data-id="73185af6" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:100}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-57d530c elementor-widget elementor-widget-image" data-id="57d530c" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="150" height="150" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20150%20150'%3E%3C/svg%3E" class="attachment-large size-large" alt="Dr. Maj Chander Prakash is Member of Dr. Maj Chander Prakash is Member of Academy of Oral Implantology" title="Home 4" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/academy-of-oral-implantology-members-Dr.-Maj-Chander-Prakash.png"><noscript><img width="150" height="150"   alt="Dr. Maj Chander Prakash is Member of Dr. Maj Chander Prakash is Member of Academy of Oral Implantology" title="Home 4" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/academy-of-oral-implantology-members-Dr.-Maj-Chander-Prakash.png" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="150" height="150" src="https://kreativedentistry.com/wp-content/uploads/2021/02/academy-of-oral-implantology-members-Dr.-Maj-Chander-Prakash.png" class="attachment-large size-large" alt="Dr. Maj Chander Prakash is Member of Dr. Maj Chander Prakash is Member of Academy of Oral Implantology" title="Home 4"></noscript></noscript> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-79151ac elementor-invisible" data-id="79151ac" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:300}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-ff48ec elementor-widget elementor-widget-image" data-id="ff48ec" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="150" height="150" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20150%20150'%3E%3C/svg%3E" class="attachment-large size-large" alt="Dr. Maj Chander Prakash is Member of Dr. Maj Chander Prakash is Member of Academy of Oral Implantology" title="Home 5" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/academy-of-oral-implantology-member-Dr.-Maj-Chander-Prakash.png"><noscript><img width="150" height="150"   alt="Dr. Maj Chander Prakash is Member of Dr. Maj Chander Prakash is Member of Academy of Oral Implantology" title="Home 5" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/academy-of-oral-implantology-member-Dr.-Maj-Chander-Prakash.png" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="150" height="150" src="https://kreativedentistry.com/wp-content/uploads/2021/02/academy-of-oral-implantology-member-Dr.-Maj-Chander-Prakash.png" class="attachment-large size-large" alt="Dr. Maj Chander Prakash is Member of Dr. Maj Chander Prakash is Member of Academy of Oral Implantology" title="Home 5"></noscript></noscript> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-1483586a elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="1483586a" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2de30a38" data-id="2de30a38" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-618e2961 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="618e2961" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-5271656e" data-id="5271656e" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-50418b90 elementor-widget elementor-widget-heading" data-id="50418b90" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Team of Great Skilled Cosmetic Best Dentist In Gurgaon.
</h2> </div>
</div>
<div class="elementor-element elementor-element-53473b85 elementor-widget elementor-widget-heading" data-id="53473b85" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">In Our Maxillofacial Surgery & Treatment</h2> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-5e7cb72b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5e7cb72b" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-498e537d elementor-invisible" data-id="498e537d" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-6991daf4 elementor-widget elementor-widget-image" data-id="6991daf4" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="400" height="295" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20400%20295'%3E%3C/svg%3E" class="attachment-large size-large" alt="Root Canal Treatment" title="Home 6" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/Root-Canal-Treatment.webp"><noscript><img width="400" height="295"   alt="Root Canal Treatment" title="Home 6" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/Root-Canal-Treatment.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="400" height="295" src="https://kreativedentistry.com/wp-content/uploads/2021/02/Root-Canal-Treatment.webp" class="attachment-large size-large" alt="Root Canal Treatment" title="Home 6"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-53fd4026 elementor-widget elementor-widget-heading" data-id="53fd4026" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="/services/root-canal-treatment/" target="_blank">Root Canal Treatment</a></h4> </div>
</div>
<div class="elementor-element elementor-element-71ad10a2 elementor-widget elementor-widget-text-editor" data-id="71ad10a2" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Also known as <strong>ENDODONTIC TREATMENT</strong>. Easy, painless treatment for saving your natural tooth against inflation.</p> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-7ccd0f85 elementor-invisible" data-id="7ccd0f85" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:100}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-5eba8421 elementor-widget elementor-widget-image" data-id="5eba8421" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="400" height="295" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20400%20295'%3E%3C/svg%3E" class="attachment-large size-large" alt="Tooth Whitening Procedure" title="Home 7" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/tooth-whitening-procedure.webp"><noscript><img width="400" height="295"   alt="Tooth Whitening Procedure" title="Home 7" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/tooth-whitening-procedure.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="400" height="295" src="https://kreativedentistry.com/wp-content/uploads/2021/02/tooth-whitening-procedure.webp" class="attachment-large size-large" alt="Tooth Whitening Procedure" title="Home 7"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-6521cebc elementor-widget elementor-widget-heading" data-id="6521cebc" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="/services/tooth-filling/" target="_blank">Tooth Filling
</a></h4> </div>
</div>
<div class="elementor-element elementor-element-633da5c4 elementor-widget elementor-widget-text-editor" data-id="633da5c4" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Dental filling is a form of treatment to repair a broken tooth structure that may have been caused by decay or trauma.</p> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-1a711e88 elementor-invisible" data-id="1a711e88" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:200}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-62d124ef elementor-widget elementor-widget-image" data-id="62d124ef" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="400" height="295" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20400%20295'%3E%3C/svg%3E" class="attachment-large size-large" alt="Dental Crown Tooth Bridges" title="Home 8" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/Dental-Crown-Tooth-Bridges.webp"><noscript><img width="400" height="295"   alt="Dental Crown Tooth Bridges" title="Home 8" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/Dental-Crown-Tooth-Bridges.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="400" height="295" src="https://kreativedentistry.com/wp-content/uploads/2021/02/Dental-Crown-Tooth-Bridges.webp" class="attachment-large size-large" alt="Dental Crown Tooth Bridges" title="Home 8"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-45f8de34 elementor-widget elementor-widget-heading" data-id="45f8de34" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="/services/dental-crown-tooth-bridges/" target="_blank">Dental Crown & Tooth Bridges</a></h4> </div>
</div>
<div class="elementor-element elementor-element-53106f51 elementor-widget elementor-widget-text-editor" data-id="53106f51" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Dental bridges are used to bridge the space between missing teeth. Natural teeth or implants on both sides.</p> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-7af42883 elementor-invisible" data-id="7af42883" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:300}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-318f961d elementor-widget elementor-widget-image" data-id="318f961d" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="400" height="295" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20400%20295'%3E%3C/svg%3E" class="attachment-large size-large" alt="Kreative Dental Clinic &amp; Implant Centre - Tooth Whitening" title="Home 9" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/tooth-whitening.webp"><noscript><img width="400" height="295"   alt="Kreative Dental Clinic &amp; Implant Centre - Tooth Whitening" title="Home 9" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/tooth-whitening.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="400" height="295" src="https://kreativedentistry.com/wp-content/uploads/2021/02/tooth-whitening.webp" class="attachment-large size-large" alt="Kreative Dental Clinic &amp; Implant Centre - Tooth Whitening" title="Home 9"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-70f81ba1 elementor-widget elementor-widget-heading" data-id="70f81ba1" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="/services/teeth-whitening/" target="_blank">Teeth Whitening</a></h4> </div>
</div>
<div class="elementor-element elementor-element-72326042 elementor-widget elementor-widget-text-editor" data-id="72326042" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Do you hesitate to smile ?<br />Sometimes drinking too much coffee, tea, or smoking can change the color&#8230;</p> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-d375f23 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="d375f23" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-385cc3d elementor-invisible" data-id="385cc3d" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-035a99d elementor-widget elementor-widget-image" data-id="035a99d" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="400" height="295" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20400%20295'%3E%3C/svg%3E" class="attachment-large size-large" alt="Kreative Dentistry - Dipigmentation" title="Home 10" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/dipigmentation.webp"><noscript><img width="400" height="295"   alt="Kreative Dentistry - Dipigmentation" title="Home 10" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/dipigmentation.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="400" height="295" src="https://kreativedentistry.com/wp-content/uploads/2021/02/dipigmentation.webp" class="attachment-large size-large" alt="Kreative Dentistry - Dipigmentation" title="Home 10"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-717d249 elementor-widget elementor-widget-heading" data-id="717d249" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="/services/depigmentation/" target="_blank">
Depigmentation</a></h4> </div>
</div>
<div class="elementor-element elementor-element-30dc4c8 elementor-widget elementor-widget-text-editor" data-id="30dc4c8" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Your Gums lightened up with the latest cosmetic dentistry technique. We assure you to get a beautiful smile for life.</p> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-b6a559e elementor-invisible" data-id="b6a559e" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:100}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-8cacfa1 elementor-widget elementor-widget-image" data-id="8cacfa1" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="400" height="295" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20400%20295'%3E%3C/svg%3E" class="attachment-large size-large" alt="Kreative Dentistry - Wisdom Tooth Surgery" title="Home 11" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/wisdom-tooth-surgery.webp"><noscript><img width="400" height="295"   alt="Kreative Dentistry - Wisdom Tooth Surgery" title="Home 11" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/wisdom-tooth-surgery.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="400" height="295" src="https://kreativedentistry.com/wp-content/uploads/2021/02/wisdom-tooth-surgery.webp" class="attachment-large size-large" alt="Kreative Dentistry - Wisdom Tooth Surgery" title="Home 11"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-d9fbabc elementor-widget elementor-widget-heading" data-id="d9fbabc" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="/services/wisdom-tooth-surgery/" target="_blank">Wisdom Tooth Surgery</a></h4> </div>
</div>
<div class="elementor-element elementor-element-051a24a elementor-widget elementor-widget-text-editor" data-id="051a24a" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Wisdom teeth are the third set of molars in your mouth and are recommended to be removed.</p> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-becc2ac elementor-invisible" data-id="becc2ac" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:200}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-d202aad elementor-widget elementor-widget-image" data-id="d202aad" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="400" height="295" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20400%20295'%3E%3C/svg%3E" class="attachment-large size-large" alt="Kreative Dentistry - Invisible - Braces" title="Home 12" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/braces-invisible.webp"><noscript><img width="400" height="295"   alt="Kreative Dentistry - Invisible - Braces" title="Home 12" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/braces-invisible.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="400" height="295" src="https://kreativedentistry.com/wp-content/uploads/2021/02/braces-invisible.webp" class="attachment-large size-large" alt="Kreative Dentistry - Invisible - Braces" title="Home 12"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-366dc0b elementor-widget elementor-widget-heading" data-id="366dc0b" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="/services/invisible-braces/" target="_blank">Invisible Braces</a></h4> </div>
</div>
<div class="elementor-element elementor-element-9f01f8f elementor-widget elementor-widget-text-editor" data-id="9f01f8f" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Transparent braces made up of special material that is used to straighten teeth just like braces.</p> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-2f35310 elementor-invisible" data-id="2f35310" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:300}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-922fb04 elementor-widget elementor-widget-image" data-id="922fb04" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="400" height="295" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20400%20295'%3E%3C/svg%3E" class="attachment-large size-large" alt="Kreative Dentistry - Dental Implant" title="Home 13" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/dental-implant.webp"><noscript><img width="400" height="295"   alt="Kreative Dentistry - Dental Implant" title="Home 13" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/dental-implant.webp" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="400" height="295" src="https://kreativedentistry.com/wp-content/uploads/2021/02/dental-implant.webp" class="attachment-large size-large" alt="Kreative Dentistry - Dental Implant" title="Home 13"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-5d74edc elementor-widget elementor-widget-heading" data-id="5d74edc" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="/services/dental-implant/" target="_blank">Dental Implants</a></h4> </div>
</div>
<div class="elementor-element elementor-element-0e33bb8 elementor-widget elementor-widget-text-editor" data-id="0e33bb8" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>A dental implant is used to support one or more false teeth. It is a titanium screw that can replace the root of a tooth&#8230;</p> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-39f96fd7 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="39f96fd7" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-428188ec" data-id="428188ec" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-31c52b76 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="31c52b76" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-4a12c8f4" data-id="4a12c8f4" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-34b8535 elementor-widget elementor-widget-heading" data-id="34b8535" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Best Dentist In Gurgaon.
</h2> </div>
</div>
<div class="elementor-element elementor-element-56476c85 elementor-widget elementor-widget-heading" data-id="56476c85" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Treatments and Emergency conditions
</h2> </div>
</div>
<div class="elementor-element elementor-element-6efcde1c elementor-widget elementor-widget-text-editor" data-id="6efcde1c" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>We specialize in a wide array of dental fields and have some of the best facilities.</p><p>The best implant dental clinic in Gurgaon also provides comfortable treatment teeth of patients plus their safety. Kreative Dental Implant and Centre A multi-specialist dental clinic is always ready to make your smile better.</p><p>Kreative Dentistry aims to offer the best-in-class offer for your teeth.</p> </div>
</div>
</div>
<div class="elementor-element elementor-element-1ee1a7f elementor-widget elementor-widget-heading" data-id="1ee1a7f" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<span class="elementor-heading-title elementor-size-default">EMERGENCY CALL</span> </div>
</div>
<div class="elementor-element elementor-element-7aecb9ae elementor-widget elementor-widget-heading" data-id="7aecb9ae" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<span class="elementor-heading-title elementor-size-default"><a href="tel:+91-9810413883">+91-9810413883</a></span> </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-48607c95" data-id="48607c95" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-6958ed64 elementor-view-framed elementor-shape-circle elementor-widget elementor-widget-icon" data-id="6958ed64" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" height="32" width="32" id="svg2"><metadata></metadata><defs id="defs6"></defs><image y="-2.2614174" x="-2.2601576" id="image10" xlink:href="data:image/png;base64,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 " style="stroke-width:14.01911068;image-rendering:optimizeQuality" preserveAspectRatio="none" height="36.521576" width="36.521576"></image></svg> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-744c8067 elementor-widget elementor-widget-heading" data-id="744c8067" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Checkups</h3> </div>
</div>
<div class="elementor-element elementor-element-b23456f elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="b23456f" data-element_type="widget" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-f6dacd9 elementor-view-framed elementor-shape-circle elementor-widget elementor-widget-icon" data-id="f6dacd9" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" height="32" width="32" id="svg2"><metadata></metadata><defs id="defs6"></defs><image y="-2.2614119" x="-2.2601576" id="image10" xlink:href="data:image/png;base64,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 /z/m6Wdh/LSyAAAAAElFTkSuQmCC " style="stroke-width:14.01911068;image-rendering:optimizeQuality" preserveAspectRatio="none" height="36.521576" width="36.521576"></image></svg> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-22e24c79 elementor-widget elementor-widget-heading" data-id="22e24c79" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Broken Tooth</h3> </div>
</div>
<div class="elementor-element elementor-element-4ed7e3f4 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="4ed7e3f4" data-element_type="widget" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-4c611cbe" data-id="4c611cbe" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-365a1e1 elementor-view-framed elementor-shape-circle elementor-widget elementor-widget-icon" data-id="365a1e1" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" height="32" width="32" id="svg2"><metadata></metadata><defs id="defs6"></defs><image y="-2.2614119" x="-2.2601576" id="image10" xlink:href="data:image/png;base64,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 AzEBFVu/w0mvAAAAAElFTkSuQmCC " style="stroke-width:14.01911068;image-rendering:optimizeQuality" preserveAspectRatio="none" height="36.521576" width="36.521576"></image></svg> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-7458af47 elementor-widget elementor-widget-heading" data-id="7458af47" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Critical Tooth Care</h3> </div>
</div>
<div class="elementor-element elementor-element-a581e8d elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="a581e8d" data-element_type="widget" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-a354066 elementor-view-framed elementor-shape-circle elementor-widget elementor-widget-icon" data-id="a354066" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg8" viewBox="0 0 8.4666665 8.4666669" height="32" width="32"><defs id="defs2"></defs><metadata></metadata><g transform="translate(0,-288.53331)" id="layer1"><image width="9.6628227" height="9.6628227" preserveAspectRatio="none" style="stroke-width:14.01936817;image-rendering:optimizeQuality" xlink:href="data:image/png;base64,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 " id="image96" x="-0.59807795" y="287.93524"></image></g></svg> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-1492720e elementor-widget elementor-widget-heading" data-id="1492720e" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Broken Jaw</h3> </div>
</div>
<div class="elementor-element elementor-element-681f9609 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="681f9609" data-element_type="widget" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-d369d78 elementor-view-framed elementor-shape-circle elementor-widget elementor-widget-icon" data-id="d369d78" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" height="32" width="32" id="svg2"><metadata></metadata><defs id="defs6"></defs><image y="-2.2614183" x="-2.2601576" id="image10" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAYAAAD0eNT6AAAABmJLR0QA/wD/AP+gvaeTAAAwS0lE QVR42u3dCZgV1Zn/cYxJNDHxn2Rm/kkmzsQ4jHD7NrjgFjUuiBI1bklIXEbS3FvdyCabbCraUXFD u6vqdgMNDc0qgoBssgiyI2uzCwLNvu/72g01p1pwCKG3t87tvvfW9/M859FnJt6tT9XvrVOnzqlW DQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQIvqz9lXB8LW80lhs0dS2B4aCNs9kwyr0Y0p mT/h1wEAIAGpwA8lha09qjmXaPuDhtWMXwkAgIQKf6trCcF/UTN7VEtP/w6/GAAAcS4QNt8tX/h/ 23pTBAAA4K/wpwgAAMCn4U8RAACAT8OfIgAAAJ+GP0UAAAA+DX+KAAAAfBr+FAEAAPg0/CkCAADw afhTBAAA4NPwpwgAAMCn4U8RAACAT8OfIgAAAJ+GP0UAAAA+DX+KAAAAoilomJm6AvvmJtlO7viF zq3NumsrAoKGlUsRAABAjF7539g4y5m2dIPjWlywXWsRwEgAAAAxHv7nUQQAAOCz8KcIAADAp+FP EQAAgE/DnyIAAACfhj9FAAAAPg1/igAAAHwa/hQBAAD4NPwpAgAA8Gn4UwQAAODT8KcIAADAp+FP EQAAgE/DnyIAAACfhj9FAAAAPg1/16nCIufTWSvUlsLdKAIAAPBL+H+1caezaO1WZ8i0pRQBAAD4 KfzPN4oAAABKkBSy3knE8KcIAADAp+FPEQAAgE/DnyIAAACfhj9FAACA8Pdp+FMEAAAIf5+GP0UA AIDw92n4UwQAAHwjELYydAXdzU2yndlfbYrr8D/fPp6qvQj4kN4GACD8Yzj8o1YEhCIP0+sAAIR/ DId/lIqAefQ8AADhH+PhH4Ui4Oz1DTN+RQ8EAFQ6JvxV7cTAoBGpSy8EAHDlHwfh77bJ+Wuce9vk ei8AUs369EQAAOEfL+HfNlfLb1czNet6eiMAgPD3UfirVkBvBABUCu75ewv/+/SFv6MKMYMeCQAg /H0U/kkhe0K1BkMvp1cCAKKKYf+YGfZXzZxVI/Tej+mVAACu/P0y7B+yZhP+AADCn/AHAIDwJ/wB ACD8CX8AAAh/wh8AAMKf8AcAgPAn/AEAhD/hT/gDAAh/wp/wBwAQ/oQ/4Q8AIPwJf8IfAED4E/6E PwCA8Cf8CX8AQFWHf9j8O7v6sasfAMBX4W89oNpZwp/wBwD46+p/FuFP+AMAfCSQlvlLHVf/hD/h DwCII0EjUpcJf0z4AwD4TFIo8rDXAHv45X7OvsPHufLnyh8AEDcFQGpGUEeQPd55YKUVAYQ/AACe OZclhe3N8VIEEP4AAGgSCFstdQXbo6/0d3YfPMo9f+75AwBiXZ20nO8FwvZUXQEXjZEArvwBAIiC YDjjZyqgFsViEUD4AwAQRTemZP5E7QcwP5ZuBzDsDwCAz4oAwh8AAJ8VAYQ/AAA+KwIIfwAAfFYE EP4AAPisCCD8AQDwWRFA+AMA4LMigPAHAMBnRcC2vYcIfwAA/FYE1Gvfx5mypIDwBwDAb0XAA+0q rwgg/AEA8FkRQPgDAOCzIoDwBwBAcxEQCJkLYrkIIPwBANCtwdDLg2FzuL4tc/UWAYQ/AABRCX9r sM7w11kEEP4AAMRR+OsoAgh/AADiMPy9FAGEPwAAcRz+kiKA8AcAIAHCvyJFAOEPAEAChX95igDC HwCABAz/0ooAwh8ANEkyrCfUiXBY0LC2qn8eSwrbm90ACITsevw6saNWk24/vb5hxq8CKdZ/1wpl XhdMyf5F9efsqxM1/C9VBBD+AKBBzYZZ/6LCf1KpJ0i16EuwafaP+LUqTzCc8bNAOPNJ9ft3VQE1 Rv1ztWqnS/obqcLteCBsLXWLuKSw+Xe3cKuTlvPDGAj/Qp1FwCczlhP+AOBV7ee7XqVOgovLebKc HmyQ/n1+tSgWYymZ1wYM65Vzf5MzGgLulCoMpgUMu4lbUFRB+O+vkWbdr/65SNdrqu+jcWTBnEX4 A/ClpJBpVehqKWy/yq+mWXr6d85d6U9X7WwUh9FPuSM5NUOZv62s8K9pWHXcl9a9gRBX/gDggXtF 6IZCha6+wtbB6i3sK/j1dAW/9bz6XVdWeviF7alBI1K3MsL/vFgqAgh/AP4uAAz7GdHJ0zAf5Nfz +NunZt7ohlAMBOGY60Pdrot2+MdSEUD4AyCEDKuzrACwm/DrybijJ+qqP0MFblHMDIcb+ibplRb+ sVAEEP4AoKj7we+KJmGF7Q78epLfO+vX6vebE0v3wTW3MsO/KosAwh8AKAAqXXLIfkj9docI/6op Agh/AKAAqPzwN+w/qt/tJOFfNUUA4Q8AFACVTq2m2FjT8/yx2vYEQ/YNXn6jaBYBhD8AUABU/u8b sp6Kqcl+MRj+0SwCCH8AoACogvC361V0jQW/hn80igDCHwAoACpdcqMP/0P9Tnu55181RQDhD8C/ AWSYP1f3nkPBsPmmOpnmlNiMcu8B8I8tZM0r8TXDZg91An7DXeHO3WTIb7+92nzne6pA+jKaAawW cHJuSI04N6VFnBtVu0G1YAKEv44igPAH4Evubn0qCLJL2zGuktsJ9Xne89PSwUmG3UX371gr1Xbu bNbNqde6p/NYu97OUx3znD9e1Nz/26Mv9Xbqtspxbm/azVFPHkTj73lY97C/ziKA8Afgz/D/Zl3/ JbE5ZGzOcncdTPyRl8yAzuLr5sZZzoOtezlPdejzT4FfVnuifR/n/pY5xSME2kYewtbuygzYc316 UXn7GOEPwJfUkPvEGL9vPCjhr/5D5hc6fit3eP9BdbVf0dAvqbmFQHKqthGBrpX5m7qhrt5zWOkb G1l9r2mQ8QPOAgD8F/6G9UgcTBw7q+6N35aw4W9YT+j4ne5omu08KbjiL6s91q6PU0eNKGj4jKdr hTKvq/QRrpB1v5r70E+9/2p3HoK6PbBK7WWRW+LWxgDgBypYP46P2eN2JGELgLA11+vvc++LPbQH /8XzBG5tkq1j86DuHHUAEBvhsy5OHh+bl5AFmLo69frbuJP3ohn+FzYNRcCJYEr2LzjyAKDqC4B9 cVIArEnQ33+ktyv/ygt/bSMBIet1jjwAqOoAUvdD46MAMGcl3NX/NzPVxRv93KaCuDLD/3xz5xnc 1NjLEwL22mrVnMs4+gCgSkPI6hUnIwBvJ9pvHzDsJl6e74/GhL/ytkdfyvX4WGDiTuoEgPgYAWhk 3u7Oso/x8C+sETJrJNxvb1iTpL/JA61yqiz8z7e7mneXL7mrlpLm6AOAqh4FUI9ExXIBkIhhEWyQ /n313Y5Kfg93Gd+nqjj8ixcMUiMQqu9I/65zOfIAoIq5y+2qpVDHxGgBMKBag6GXJ1wBEI7cJb76 b1n1V//fjgKoZYalozrVn7Ov5ugDgKqWnv4dNSGwhTox74iR4N+ohsgbJerPrb7fS5LfxV2n312q N1YKgIfb5nrYec+ux4EHALFCXW27K6QFQmZDNbybVlJLMswJwslfw0t73eKdAIt3jEvsWeLSyZdV NfO/tFZbuGeAurXTlAMOAOKMe19eWAB04NcrHgGYLvn97nsxJ+YKgN82k00GDBpmJj0BACgA/FYA bJH8fu6Qe6wVAO6GQbJbANYYegIAUAD4rQA4Ivn9Ho+h+//nW/02vaTzAGbSEwCAAsA/3AmXgrUX 1LyBmAt/j4sCLeZIAgAKAN8INs3+kewJgNgsAB5r31taABRwJAEABYBvXJuSd2UiFQB/aNdbuinQ Ko4kAPBJAaAe82vPr1c8B+C05Pd7KgYLgEektwBC1nx6AgDEGfXMfkdhAWDw6xUXAAckv597tR1r BUC91j2FBYD5BT0BAOItwAzrCdktgMhd/HrybZgfUmEbawXAPS16CB8DND+iJwBAnKn9fNer1En8 UAVP+tsScV1/4QjAaElo/k6FbawVALeq1QlFIwCGlU5PAID4DLFOFbr6D5mp/GrnRwDsD0Q7ATaO xFT4P9khr3h/AtktAPs5egIAxCN1Na9O5J+V82pvYKKv718R6pn+v0k30Xm0XeysBviA9P5/8VMN Zm16AgDEa5Cpfe3Vkq5ZKtCKSjjRn04y7C4M/f+jGkbkN9LgvKt595gpAOq8kCUtAPa6CyLREwAg 3guBRnaSOqm/rdoUd4U3dcU/yb3Hm5xm/xe/zqUVb3ks2kTHioktgX/fVrwEsPsdRtADAAD+LJoM K1caoL9t1q1Kw99dj+Bm+dW/EzDsJvQAAIBPC4BIXWmAuu33VbgzoLstsYfPfrp6I/vf6AEAAH/6 ZlOgLdIgrZ0aqZJbAe7Kf0HpzP9v2mf88QEAvuZOkPQyCnCzeizwyQ59KnXd/9qpnsJfNbMBf3kA gK+pR+F+rkLxhJdAveWFbOeJDpWz698NaRGP4W+v5YkQAACqFa8J0M1bqH6zQFA09wl4WM03qOX5 yp+9IAAA+FYgnPVr9UTAca/hmqwCup7mvQLc2f73eJvwd2ErqN7CvoK/OAAA50cBDKuzppB1blFr 87sT9byGv7vx0I2eh/wvLFDMP/CXBgDgAtem5F3pXiHrCttv5gZkOQ+06lm8Xn95Q/9x9VTB/S1z im8p6Pws7uZH/JUBALiEQNi8p5QlleWr7qnmLtl7d/MeTt1WOc5DbXoVryFQv02u86C6yncD/y61 sNBNjbOK/7dJ+tve5EYf/gd/YQAASqDzVkCMtLNqSegn+MsCAFAatTiQmik/MYEKgK78UQEAKIfq z9lXqwWC8hMg/EfyzD8AABUpAtRa+SpAV8dr+AfC9lR3YiN/SQAAzrk+7YN/dbdPrtnIvjdgmH9V 9/3TAiG7lVolr3EgZIbdpXLdR+ZqhuyH1L+vjcMCYKW6jdHS/U7F3019R/e7ut/Z/e70AABAgnMu q5UWqZlkmP+jZtebKsxnqXA8VuFZ/IZVmGATA4+5v0Xxb6J+G/c3cn8r+gsAIH6pe97BkHW/upqP qODemmDBHc22RT0tYCcbmfcxbwAAEDfc4W11VdtDBdkewtzzugW7VTHQXRUDAXoWACA2gz9k3R0I WWOKn3cnvKOxhsCkYNh+jFsEAICYoMLpgQR5VC8+mvqtg0akLj0PAFAlahv2NWqIuj+hXEWPF6rR lpopmdfSEwEAlaJOWs73kkLW6zq27aV5f4rAXTLZ/ZvQMwEAUeNuZKOuPGcTvDHWQtb8GkbkN/RQ AIB2gXDmkyps9ifQELqarGgn0oTFfcGQ+Tg9FQCgh9qUJylkf8Ds/vh4WiBomO/zpAAAwBu1EI0a Xu5DsMZdG8S8AACASPUW9hWBsDmcMI3fpwSuaZDxA3oyAKDcgk2zf+TuYkeQxvvkQPOL2s93vYoe DQAomxr2P7eiX6WE1H1tc51nugxxmtqjnVfzJjnvDJ7upPf/wunU+3PnxeyxToM3Bzu3N+8eN6F7 e/MeziMv93P+591PnGaR0d+2JtYo57l3hjqPdx7g3PliTiV+JnsUewoAAMrkbkQTzUB64rWBjjXi S2fa0vXOnoPHnPLaffCoMym/oLhAePL1gTET+A91yHPa9xzv9Bw73/licYGzaO3WcrWpi9c5fSYs UIXORKd+x7xo7ylg0rMBACWHf8hqEa2r/O5j5jsbdh5wdCnYts+xP53j1G3Xp9JD/+5WPZ3OfSc5 Y+euLHfgl9XGzlvlvNZvUvRGB9Tflh4OAPgngZBdT10pFukMncfUcPens1Y6pwuLnGg5dOykkzcx 3/l9p75RD/6HO/VzskfPcRas3qIt+C9u877e7JgjZjv12ufpHgUocv/G9HQAwLduTMn8ibpXvFnb ffAWPZzccQujGvz7jxx3Vm7a9W1w5q/Zqm4tzHZ+27KH9uB3r8o//GSmszCKwX9xW7hmc/F7unMK tBUBhrU1GM74GT0eAFBM3fcfqCtkWncf5+w7fDx6wX/4mAr+nSUG5+wVG5wXs8a4YacjMJ0W6rW+ XLmx0oL/4jZt6Trnb+8P01nQDKDHAwCqBQ37zzqC5cbGWc5HU5ZGLfhPni501m7dU+7gzB0339PV 8x1qFMOdpFdVwX9xe1dNfrwhLaJnJCBk/omeDwB+Dn81HKwCYY+OSXHLN+yMSvCfPXvW2bHvsLO4 YFuFQ3NS/priWfoV/T7urHz3v/V8P3/VZmfm8g3OfHVfX0cR8MmM5VpuCaj5ALtrNen2U44AAPDt 1b/5vtcwcWfhr9+xPyrhX1h0xllTgav+S7VZKoDdtQTK+33c/63730jfb/KitU6b7p85v2vd6x9e 94bGkeKJio26Dnfe+Xi6M+pL2RME7pMHbsHleaXAsPkuRwAA+FBtw75G3eM+7iVEHlDhv23v4aiE /7GTp50VG3ZouXJ2Z+236THOSU61S/wu7v+vbc44TzP8e4yd59z0Qna5f7966vd7vd9kZ+qSggq9 z8SFq527LyowBPMbjl/fMONXHAkA4Ler/7DVy0uA3KZW51u9ZU9Uwv+AmuEvGfIvq32mnrXv0GuC 88f0Qap46V3c3H/vmDuh+Dl8L6/de/wCJ9mwZfMnXshyWnUfW6FCYNTsr5ybm3TzujZADkcCAPhI jZBZQwVAoTQ4aqVG1L3tjVEM/60xM/muPM198sCdNOh1WP6WZt2c94ZML36ksTzvmzchXxUdniYG FgZSrP/miAAAn1DP/Ee8BFXWqLmE/wXNvaevc92BZ98e4kxftq5c7/2y2jOBZYIBAGVyt4hVJ/79 0sD4098/Kp6cp9uR46eiMuxfGe3pLh9rX3zonja9im9ZlGfBoD+82t/Lex2ok5bzQ44MAEhwwZCd 4uVZf3cNft1OnS5ylq3fHpfh77YHorQfgfvI3/CZy8t8/9FzVjq1PawREAiZDTkyACDBqRP+HGlQ vKuGunU7c+ass+qCJX3jsdXvlBfV7YXLMxLgTiL08D4zOTIAIJGv/sMZ1aUhcWuz7lFZ4nfTrgNx Hf5u07xU7yV3U5y1ovTliN0nCG6uwCOI/zSxM5R5HUcIACRsAWA2lwaEu/WuboePn4z78HdbZOSc qO9E6BYZZU8InCi/DWDYTThCACBBBULWGOljf7sOHNU+9L9i446EKADciXjRmgdwYXO3Ii7tc0xR owC1Um3p64/kCAGARLz6b5D+fXWSPyIJhxezx2q/+t+692BChP//Lcyz0qnTtFtUCwB3W2J3zYHS Psfz734iff3D6mmA73GkAECCqdnIvlcaPDOW6V3053RhkbMkTh/5K6sIqBflkYDX1NLBpa5IOGGh l/0B7uFIAYAEEwjZ7SSh4F7VnlKBrdOW3QcSLvwv3HfAGjHbafjeMKde+zzvy/Ve4qmAOStLnhA4 T+08eJNwMmAwZLXhSAGABKPWfe8jCYUm1ii9z/yrYmJxAl79l9bcwO43Kd9pZo/y9Lz++eYWGKW9 3zNvfyxdFbAXRwoAJFoBIHz+f8DkJVoLgO37Dvkq/C9u4+d/7TypNiDyUgD8+Y2PSn2PtwdPE762 OYsjBQASjLq6OygJhcUF27UWALq2+I3nNl8N0zfqOlxcALgbAJW2LsDHU5ZIX3s/RwoAJJBAWuYv pWFz6NhJbeF/6OgJ34f/t/fqV3lbwz933PwSX3vGsvXi163eyP43jhgASBBJqRlBSRjc2yZX69X/ hh37CP8LmrvOf9CQBXUntehPaa8t3Z7Y3SqaIwYAEmUEwLDvkITB012GaC0A4nnDn2g16YS9slYG fPTVfrLbC6HILRwxAJAwBYD5oCQMwh+O0Bb+x06eIvAv0T4cNksU1I+83K/U13W3bRY+Cng/RwwA JEoBELKequoVAHfsP0zgX6KNULcBRLdn1AZBpb3uc+8MFRYA5uMcMQCQIIKG/YwkDF7KGa+tACjY vpfAv9QufovXiYLavcdf2us2+mC4cFMg868cMQCQIJJTzT/IFgEare/xv408/nfpjYS2iDbwcTcf Ku11n+4im1uQFIo8zBEDAAkiybB/JwkDd2MZLTv/nT1L2JfSHu5U8Ql77hV+aa/5eOcBskmAqdad sdR3az/f9Sp3YmLQiNRNNjID1dLTv8MRDQDlHQEwzNqSMHjitYGaJgCeJuhLaW8MmFLhv03PsfNL fU13HwLZhkBWciz02VppkZpJhjVEfaYTF33GHWpZ69eDTbN/xJENAGUIhLN+LQmDm5tkF1+9e3WQ BYDK3Cvg7ta9KlSY5a8p7bbCZucG4Z4DtQ37mqrur2rOyp/V+gjHS/+s9oqaKZnXcnQDQCnUPu8/ VCfNM5JA2LjzgOcCYP/hYwR9ORYFuqVp2bv4/U4VCpMXrS31tcbOWyVdCfDMNQ0yflCVffXcttWn y/l5V9YIvfdjjnAAKIU6Wa6ThMKk/ALPBcCeg0cJ+XK0z1Rwl3bv3n20b+qSgjJfJ2fsPGEBYK+t 0k7aYOjl6nN8VcEdDN/i6AaAUgsAe5Rs69kvPRcAu/YfIeDL2dyh/UFfLHHa9xzvpKjV/sIfjHBe 7v25M2LWinK/RsfcCdIC4NOq7KPBVLO+4HPvuy89/bsc4QBQUgFg2F1kS84OpwCIs/ZH4XbDwbD5 ZlX20UDYfFfyuWsaVh2OcAAo6eoqbD0rnQh4urDI2y2AQ9wCqKy2YPUW58YXsqRPADxdtaNU1gDR yIVhPcERDgAlKH6sSrhF7PINO71NAjxynHCupPbJjOXirYDdPlK1o1TFj/0JFi+y/sIRDgAlci5T owC7JSfY/pMWeyoADh3jMcDKam9/NFVaAOxx+wgFAAAkIHWyHC05wbbuPs5TAXD8FAsBVVZztwkW TgAcVeX9kwIAAKIjGLY7SE6w96md57w4qxYTWlywjYCuhHbniznS+//tKQAAIFFHAIR7Arht655D noqAlZt2EtBRbhMXrBbf/w+GrLspAAAgQVVvYV+hTpgnJSfZsXO/9lQAbNixj5COcouM/FJaAJy8 NiXvSgoAAEjkUYCwNUdykn1z4FRPBcDO/YcJ6Si3FlljhM//21/GxggVBQAARO8kG7I/kJxkn1KL y3hx5PgpQjrKrX6nvtIRgK7R6m/urn1qgZ+mgZA1xt3A59yS1CU086hwAuPO0l5Xvf8C9dp5SaHI w5wBAPhWsmH/UbRPvGE7h1WIS51hImBU2+wVG5zkVFs2ATBkPRWV8A9bv1evv1M6LyEaTe0yOC2Q lvlLzgQAfFgAmD+Xnjxnf7XJ0yjA6i27CesotX6f58tDMSX7F7r7WSCc+aQqAIpiKfwvaBvc44Cz AQD/3QYIWwWSE2fWqLmeCoCtew4S1lFq7oZBsbIDoFtQqNc+HKPhf34XwbGcCQD4TtCw+0lOmuEP R3gqAA6wJHDUWoM3B0uf/++rvcAUzjOp/CLAvo2zAQCfjQDYjSUnzFuadnOKzpwRFwCFRWcI6yi0 hWoDoJubdJPeE0+LwgjTungoANTTA+9wNgDgK+qqL1l60ly1ebenUYCvNrIgkO42YqZ8A6Ck1Iyg 1tGlBunfV697Ni4KgLA1krMBAJ9xLlMnv32Sk+ZHU5Z6KgA27txPaGtu7w6eLg3AA9XS07+js2fV fr7rVXES/qqZ4zgXAPDhbQBznOSk+VLOeE8FwJ6DRwltzc2dmyEMwc+i07esPfExB8DqxpkAgA9v A9ivSk6a9dr3YWfAGGt3t+4lmwBoWK9EqQAYEBcFQMh8nDMBAN9Rm7/cLz1x7tx/xFMRsHTddoJb U5u8aK04AJONzPui0bfUM/a11eufifEJgKvuS0//LmcCAL5z7l5toeTkOX7+Gk8FQMG2vYS3ppY9 ao40BAvdZXqjVmCGzTdjuAA4EUw1b+UsAMC/owBha6HkBPqOmnTmxY59bAykq7XqPlb4/L+5ILq9 S000NewuMfhEwN6gEanL0Q/A15JCpiU5ibqLznhx+PhJwltTe+SV/tIJcGalFJnqSlutOzFUveeR ql7+V33n965P++BfOfIBUACobVQlJ9NaqRHn2MnT8o2BzrgbAxHeXtuclRvVffyI9BG4BpXd39z1 92uFMq8rqbnL8wrv57co9XWjeKsDAOJSjVDk36VXVPNWbfE0CvD15l2EuMc2YNIi8RVxbcO+JuYK UsMaIiwA/sLRDAAVPemGrU2Sk273MfM9FQBb2BjIc3ut3yRpAbAxJvsiBQAAVJ5AyPxIctJtbI70 VADsZ2Mgz+2vb30sLQAGUQAAgM+px7WaS066t7fo4Zw5e1ZcAJwuLCLEvWwAtGaL2pwpW7oBUDMK AADwOTVD+ybpfeQ1W/d6GgVYsWEHYS5so2avlK+Al5p5IwUAAPhdg6GXq5PoIcmJd8i05Z4KgA07 9xHmwtZ16AxpAXDY/ZtTAAAA3BPvJMmJt1Pvzz0VALvZGEjcUjM+lT7//3ms9kP12QYL1/T/E0cx AMgKgHTJibd+x77eNgY6ycZA0nZv21zZCID6W8dsPxQuTKX2tbiboxgABJJD9kPS+8nuVbyUO4Vw ybptBHoF29QlBeL7/wHDfDCGRwCeFXynkzVC7/2YoxgABKo/Z1+tTr5FkkCZlF/gaRRg7dY9hHoF W87YedLh/6Lr0nL+Xyz3Q/U59yXCI40AEDfUiXSJJFTeHzLTUwGwfd8hQr2CrW3OOOkIwOJY74cB w25SgYLmYA0j8huOXgDwQJ1Mu0lC5ZkuQ7xtDHSMjYEq2h7rPEA6ApAdJ33RLMf3OereuuLIBQCv IwAh+znRmvJpEefEqUJxAVDkbgxEqJe7zV25qfg3FxYAz8ZLf1QrVDZUn3lbCQsZTauZEqnFUQsA GtRMybxWOrFs4ZptnkYBVm1iY6Dyto+mLJFPAAxn/Tqe+mSdtJzvBUJ2PdXaqeLlrUDYbBpsZCdx tAKAZurKaqskWHLHLfRUAGzefYBwL2dL7/+FtADYRg8HAFySWlHtE0m4NLVHeyoA9h0+RriXsz37 9lBhAWAPpYcDAC5JDbW2koTLnS1zHA/7AjmnTrMxUHla/pqtzu3NewiH/62W9HAAwCUFw/Zt0vvL 63fs9zQKsJyNgcpsY+d62QDIvJUeDgC4JHfSlQqLY5KAGT7zK08FwPodbAxUVssYNlO6/e/xYIP0 79PDAQAljwKoR6wkIfNq3iRPBcCuA0cI+TJaE2uUtACYRs8GAJQqybC7SELm8c4DPRUAx06cIuTL aA92yJM+//8WPRsAUKpA2H5UEjLJhu0cOX5KvjGQmkW4pICNgUpqs7/aUPwbyzYAsh6hZwMASlWr SbefqtA4Iwma+V9v9TQKsIaNgUpsAycvlk4APBsMZ/yMng0AKJMaMv5aEjZ9JuR7KgC27WVjoJLa GwOmSAuAlfRoAEB5C4D+krBp02OcpwLg0NEThH0J7W/vD5M+/9+XHg0AKBe1ImALSdi4k9S8KDpz hrAvof2udS/pEwDN6NEAgHJRe7LfIV1wZt/h456KgJWbdhL4F7VpS9fJFwBSizvRowEA5XJtSt6V KjxOSwJn1oqNngqATbvYGOjilqfmVggLgFPVW9hX0KMBAOWm1gPIl4RO34mLvG0MdIiNgf5pAuBA 4QTAkDWfngwAqFgBEDZ7SELnlT7eVgQ8caqQ0L+oNTZHShcAyqYnAwAqRM0DaCIJnae7DHG8Wrpu O8F/QXv01X6yAiBkptKTAQAVKwDC5j2S0LmlaTdPWwO71rIg0Ldt4Zotzk0vZIsKgORU6056MgCg Qmo2zPoX6czzbXsPsyCQpjZxwWrxEwDuqo70ZABAhakQ2SkJnunLNngqAA4cOU74n2u9xy+QPv+/ lR4MAJAWAJMl4dN7vLclgU8VFhH+HpcAVhMAP6cHAwBkBYBh2ZLwSe//heeJgMvWMxHQbc3sUcIR ADOTHgwAEFHDyGmS8DEyPvVcABRs20sBoFqDNwdL9wAw6MEAAGEBEKkrCZ+HX+7nuQDYuucgBYBq 97bNFRUANRvZ99KDAQAitUKZ10nC54bGWc4Zj88C7mVFQGfh6i1OrVRbdgsgzfpPejAAQOS+9PTv qjAplATQzv1HPBUAx06c8n0B8PnCNdJHAE9XazD0cnowAEBMhclGSQjlr9nmqQA4c+as7wuAQV8s lhYABfRcAIAngbA9VRJCo75c5XkewIoNO3xdAJgjZksLgMn0XACAtxGAkNVHEkI9xs7nSQCPrXPf SdJFgHLpuQAAT4Jh+zVJCHX5aJr3JwH26n8SYP7Xm51PZ68oXmEvb0J+8b9PXrTWWaAm3MVaAdAy e6zsEUDDeoWeCwDwJBAyw5IQattjvOcCYM/Bo1o20xkybanTodeE4l31aqdFLvl53Q13nu7ysfPm wCnFRUEsFAAp7w8T7gJop9BzAQBeRwAek4TQ394f7rkAOHTshDg8py1d57zS53Pnty/miEK0fsc8 5/2hM5x5qzZXWQHw1OuDpCMAj9BzAQCeJDUyb5eE0GOdB3guAE6cKqxwaE7KX+M0i4xWaxFExLvo XdjuapnjZA6fpZ5qqPwCoF67PrJtgEORW+i5AABPahiR30hC6E4VnF65iwmVf6h/s/PWoCnFQ/k6 gv/i9uTrA50JC1dXagFwa7NuLAIEAKgaddJyfiicie4UFp3xXAQsL8ejgFOWFDhPvDYwKsF/YbtF BXKfCQsqJfzdyYrubyj5nNem5F1JzwUAeKZC5YgkiHYdOOq5AFi9ZXepQTl85nLn7lY9ox7+3w6v GxEnY9jMqBcA7pMJws94iB4LANBVAKyThNG67fs8FwAbdu4vMSRHzv5KPEzurQiwncjIOVEtAEbP WSn8fPZaeiwAQE8BYNj5kjBatn5n1HYFdO/HS2f462juJj0fT1kStQJg6PRlss8WsubTYwEAukYA pkvCaO6qLZ4LgF1qU6FLTfirjHv+ZbW7W/dyZixfH5UCoN+kfOnnmkKPBQDoKgA+k4TRlMXrPBcA +w7/87bAr/WbVOXhf741V48cRqMA6KmWUhZ+ptH0WACAngLAsIZIwmjs3K+1LwY0VRUVN76QFTMF QLK6FTBKzUXQXQBY8o2ABtFjAQC6RgB6S8JoyLTlnguAYydP/+P6+N0+i5nwP9/SMj/VXgC8N2S6 dA5ADj0WAKCnAAiZliSM8ibmey4AThcWfRuKc1ZujNpCP16au7/AVLUWgc4C4I0BU6Sf50N6LABA TwFg2F0kYdR9zDzPBcDZC1YDzBo1R2dwFwTC9tRg2Nqt4/U+/ETv2gDuPgaiz2JY6fRYAIAW0i2B s0bNdXRYsm5bcSg2fO8Tr0G9JxC22tcIRf79/76dc1lyqnVnUtgc5+W1n317qNYCoFPvicJbAObL 9FgAgBbqSvlVSRjZn36ppQA4vxywuzGPNKDVlf7YWk26/bT0kQ6zrfT1b2veXWsB0DF3giNcgrkj PRYAoIV7VSkJI3OEngLgq407vSyN67YZ96Wnf7d839XKkb6P+xl1FQDte42XbQWsRjjosQAALdyr SkkYZQybraUAWLV5lzN46hJxAaBCMbm83/X6hhm/UqMFRZL3GfTFYn0FQM/x0u/7Ej0WAKCFe1Up CaMP1MQ4HdZs3e30/Ey4MI5axrjCIx5ha47kvXqMnaetAHgpR1YABENWG3osAEAL96pSEkbvD9FT ABRs2+t0HTpDeO/f/rjCIx5ha7DkvdzPqKsAaNNjnGy0I2S3oscCALRwryolYfTuxzO0FADrd+xz OvSSToozMyv8fdV/I3kv9zPqKgBadxsrvd3Rkh4LAKjSEYCuQ/WMAGzctd8JfTBCekXcrqLf1/1v JO/lfkZdBUDbnHHCEQ+zNT0WAKBnBMCwOsseA5yjpQDYpAqAP7zaXzgCYP+54gWP2UDyXo+pz1jV jwGq1okeCwDQUwCErbdkk+LmayoADji3N+8hGwFolHlzRb9vTcOqI3mvO1r00FYAvJrHSoAAgCqW FLI/kIRRnwn5WgqAr7fsFj8CWNbiP5cueDJ+Jn2/2V9tqNK9AAJh8116LABA1whAtuy5+CVaCoDp y9ZLV/87KC56wtYByXuOmr1SSwHw9uBp0qWALXosAEDPCIBwO+BPZqzQUgAMmbZUOgKwyMN3Xix5 z9xx87UUANLHHtkOGACgswAYJAmj0XNWaSkALLWksLAAGCYe9TCsEZL3dK/cdRQA5ojZ0kmP/eix AABNBYA9ShJGExeu1VIAdOotnBCn5i6Iv7Nw3oP7/L6OAqDb6DnSzYBG0GMBAJoKAHOWJIzmrtqi pQBI6TpcOiGuqYcRgGaS93zuHT3bAvf7PF9aAEyjxwIANBUA1kpJGK3ctFtLAfD7Tn2FIwCRh6Xf OWBYj0jes37HPC0FwHA1f0J422M5PRYAoKsA2CkJo217D3sO/7NnHeemF7JEYVgjZNaQfudkIzMg ec+bXsh28td4LwAmLlgtLQC202MBALoKgFOSMDp64pTnAmDPwWPSIDx7bUreldLv7P637mtI3nva 0nWeC4BZyzdIv/cpeiwAwLMaofd+LFqAJzVSfPXu1eKC7dJ74Vs1FD7bRY8/Tl/muQBwRxGSjYjo u9d+vutV9FwAgCeBcNavJSF0d6ueWu7/j537tfRKeKb3AkA2+TFbzeDXMQ9AuvxxMM36T3ouAMCT ZMOsLQmhR1/pr6UA6DtxkXQVwP4aRgAGiNYC+GiqlgLggXa9Rd/d/ZvRcwEAHgsA2WS4+h37aikA 3hw4Vbot7ptev7t0E6SW3T7TUgDc2zZXtv9BWqQmPRcA4Eltw75GEkI3NM5yis54nwTwTJch0jkA zTyPAISsFpL3fuK1gZ7Df8HqLWoehS367tc3zPgVPRcA4Mm52fBnqmIhoBUbdol3AQyEM5/0PAJg 2H+Wvv+Imcu9LQQ0KV9666Ooegv7CnouAMAzFSrrJWHUMXeiOPzd0YO/vT9MXADUTMm81uv3Tk6z /0v6/n/6+0fOQnUVLy0AjA9HSL97AT0WAKCFCpXRsslotng1wMzhs8Xh7y5cpOebO5ep19oj/Ryd ek8UrwLo/nbC9x1JjwUA6CoAXpKGoDsZcN/h4xUK/97j872EvzsM3kvXdw+Erb5ePstr/SZVKPxn LF/v1BXO/i++9RGyW9FjAQBaBEP2DV5CsMEbg50d+8peFvjEqUKnc9/JnsK/uABINevrKwDsR71+ nmb2KGfuyk1lhv+k/DXOI+rxSS/vpQqWZHosAEDnKMBKL8HkLgw0eOoyp7DozCXDf/qyDc4jL/fz HP7F98AbDL1c1/e+Lz39u+o1N3j9XA+066PWNMgvccb/e0Omixf+YSMgAHEpkJb5y5qN7HvVqmsN aDHcDGughnB2bmvevXhyX6fen6sFc6Y57XqOdx5sn6cj+M+33lH4/nm6Pt+9bXo5RsYIp3X3z5zG 5kg1WXCQU6dJtq7vPoC+Gv/NfYIlYNh3eNnLAojtYWUjUvfcUqtnNZ78aTQaLVHaUXULqmeNUOTf SQwkTviH7dcIfhqNRitHC5m73BEBkgPxP+Rv2E04qGk0Gq1CbW8NI/IbEgRxq/YL3f+/6siHOZhp NBqtok94mMNJEcStJMNsy4FMo9FoonaWfR4QvwWAcEU5Go1GoxWv8/A0SYL4vP8fNhdwENNoNJpw kauQ1YYkQXyOAITMLziIaTQaTdrsEEmCOB0BsDI4gGk0Gk24y6Vh1SFJEJfUGu23chDTaDSaaJOr r90dKkkSxO9tAMMawsFMo9FoFXsCQC2g9hgJgrhW/Tn76iTDzueAptFotHI2w0onPZAQaj/f9Sp3 jWs1pFXEwU2j0Wgltp1q7tTzpAYSjru0ZTBstg4aVq6a3TqUlsjNGqnadNUWqbZGDWeuV//cklS8 1a69WhWDC9W/T04K2Z8k3Hcv/k7W5HPfcc0339nacu43WHPuN5n+zW9EX/F9c2+ThkwrKWT9xb1Y IikAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAXOB/Ac8OF631gpjk AAAAAElFTkSuQmCC " style="stroke-width:14.01911068;image-rendering:optimizeQuality" preserveAspectRatio="none" height="36.521576" width="36.521576"></image></svg> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-18dc37c elementor-widget elementor-widget-heading" data-id="18dc37c" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Tooth Extraction</h3> </div>
</div>
<div class="elementor-element elementor-element-1fd25bf elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="1fd25bf" data-element_type="widget" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-b2cdc47" data-id="b2cdc47" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-d3ab562 elementor-view-framed elementor-shape-circle elementor-widget elementor-widget-icon" data-id="d3ab562" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" height="32" width="32" id="svg2"><metadata></metadata><defs id="defs6"></defs><image y="-2.2614179" x="-2.2601576" id="image10" xlink:href="data:image/png;base64,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 RU5ErkJggg== " style="stroke-width:14.01911354;image-rendering:optimizeQuality" preserveAspectRatio="none" height="36.521576" width="36.521576"></image></svg> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-3b2aae66 elementor-widget elementor-widget-heading" data-id="3b2aae66" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Toothache</h3> </div>
</div>
<div class="elementor-element elementor-element-567c0047 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="567c0047" data-element_type="widget" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-5805494f elementor-view-framed elementor-shape-circle elementor-widget elementor-widget-icon" data-id="5805494f" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" height="32" width="32" id="svg2"><metadata></metadata><defs id="defs6"></defs><image y="-2.2614183" x="-2.2601576" id="image10" xlink:href="data:image/png;base64,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 AAAAAElFTkSuQmCC " style="stroke-width:14.01911068;image-rendering:optimizeQuality" preserveAspectRatio="none" height="36.521576" width="36.521576"></image></svg> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-72e1ad62 elementor-widget elementor-widget-heading" data-id="72e1ad62" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h3 class="elementor-heading-title elementor-size-default">Tooth Decay</h3> </div>
</div>
<div class="elementor-element elementor-element-4903f877 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="4903f877" data-element_type="widget" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-1918424f elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1918424f" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-121ba0df" data-id="121ba0df" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-10b88237 elementor-widget__width-auto elementor-absolute elementor-widget-tablet__width-initial elementor-widget-mobile__width-initial elementor-invisible elementor-widget elementor-widget-image" data-id="10b88237" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;rotateInDownLeft&quot;,&quot;_animation_delay&quot;:1000,&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="190" height="258" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20190%20258'%3E%3C/svg%3E" class="attachment-full size-full" alt="shape lines" title="Home 14" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-lines.png"><noscript><img width="190" height="258"   alt="shape lines" title="Home 14" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-lines.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="190" height="258" src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-lines.png" class="attachment-full size-full" alt="shape lines" title="Home 14"></noscript></noscript> </div>
</div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-5072d514 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5072d514" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-77fe08de" data-id="77fe08de" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-1f74ca02 elementor-widget__width-auto elementor-absolute elementor-widget-divider--view-line elementor-invisible elementor-widget elementor-widget-divider" data-id="1f74ca02" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;,&quot;_animation&quot;:&quot;fadeInLeft&quot;}" data-widget_type="divider.default">
<div class="elementor-widget-container">
<div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div>
</div>
</div>
<div class="elementor-element elementor-element-47cd3bbc elementor-widget elementor-widget-heading" data-id="47cd3bbc" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="elementor-heading-title elementor-size-default">Kreative Dentist near you</h6> </div>
</div>
<div class="elementor-element elementor-element-60245772 elementor-widget elementor-widget-heading" data-id="60245772" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Our Team Of Dental Specialists
</h2> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-5dc1abce elementor-hidden-tablet elementor-hidden-phone" data-id="5dc1abce" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-1d4d8e8a elementor-widget__width-initial elementor-absolute elementor-widget-mobile__width-initial ekit-equal-height-disable elementor-invisible elementor-widget elementor-widget-elementskit-icon-box" data-id="1d4d8e8a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;rotateInDownRight&quot;,&quot;_animation_delay&quot;:1000,&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="elementskit-icon-box.default">
<div class="elementor-widget-container">
<div class="ekit-wid-con"> 
<a href="#" target="_self" rel="" class="ekit_global_links">

<div class="elementskit-infobox text-center text- icon-top-align elementor-animation-   ">
<div class="elementskit-box-header">
<div class="elementskit-info-box-icon ">
<img width="154" height="155" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20154%20155'%3E%3C/svg%3E" class="attachment- size-" alt="square pattern" data-lazy-srcset="https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern.png 154w, https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern-150x150.png 150w" data-lazy-sizes="(max-width: 154px) 100vw, 154px" title="Home 15" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern.png"><noscript><img width="154" height="155"   alt="square pattern" data-srcset="https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern.png 154w, https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern-150x150.png 150w"  title="Home 15" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern.png" data-sizes="(max-width: 154px) 100vw, 154px" class="attachment- size- lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="154" height="155" src="https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern.png" class="attachment- size-" alt="square pattern" srcset="https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern.png 154w, https://kreativedentistry.com/wp-content/uploads/2021/02/square-pattern-150x150.png 150w" sizes="(max-width: 154px) 100vw, 154px" title="Home 15"></noscript></noscript> </div>
</div>
<div class="box-body">
</div>
</div>
</a>
</div> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-4bd2d034 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4bd2d034" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div data-pafe-section-link="https://kreativedentistry.com/team/dr-chander-prakash-dental-and-implantcentre/" data-pafe-section-link-external="on" class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-4255ebc elementor-invisible" data-id="4255ebc" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;animation_delay&quot;:600}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-df89f54 elementor-widget elementor-widget-image" data-id="df89f54" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="370" height="330" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20370%20330'%3E%3C/svg%3E" class="elementor-animation-pulse-grow attachment-full size-full" alt="Dr Bharti Kreative Dentistry 3" data-lazy-srcset="https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3.jpg 370w, https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3-300x268.jpg 300w" data-lazy-sizes="(max-width: 370px) 100vw, 370px" title="Home 16" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3.jpg"><noscript><img width="370" height="330"   alt="Dr Bharti Kreative Dentistry 3" data-srcset="https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3.jpg 370w, https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3-300x268.jpg 300w"  title="Home 16" data-src="https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3.jpg" data-sizes="(max-width: 370px) 100vw, 370px" class="elementor-animation-pulse-grow attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="370" height="330" src="https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3.jpg" class="elementor-animation-pulse-grow attachment-full size-full" alt="Dr Bharti Kreative Dentistry 3" srcset="https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3.jpg 370w, https://kreativedentistry.com/wp-content/uploads/2021/03/Dr-Bharti-Kreative-Dentistry-3-300x268.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" title="Home 16"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-5c6f3b8 ekit-equal-height-disable elementor-widget elementor-widget-elementskit-icon-box" data-id="5c6f3b8" data-element_type="widget" data-widget_type="elementskit-icon-box.default">
<div class="elementor-widget-container">
<div class="ekit-wid-con"> 

<div class="elementskit-infobox text-center text- icon-top-align elementor-animation-   ">
<div class="elementskit-box-header">
<div class="elementskit-info-box-icon ">
<img width="49" height="49" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2049%2049'%3E%3C/svg%3E" class="attachment- size-" alt="elements 70 psychology mental health line icons MYM9N9G 1" title="Home 17" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-1.png"><noscript><img width="49" height="49"   alt="elements 70 psychology mental health line icons MYM9N9G 1" title="Home 17" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-1.png" class="attachment- size- lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="49" height="49" src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-1.png" class="attachment- size-" alt="elements 70 psychology mental health line icons MYM9N9G 1" title="Home 17"></noscript></noscript> </div>
</div>
<div class="box-body">
<h3 class="elementskit-info-box-title">
Maxillofacial surgeon </h3>
</div>
</div>
</div> </div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-5df7a1b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5df7a1b" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-47ce928" data-id="47ce928" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-eefcc5e elementor-widget elementor-widget-heading" data-id="eefcc5e" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="elementor-heading-title elementor-size-default"><a href="https://kreativedentistry.com/all_doctors/dr-major-chander-prakash/">Dr (Major) Chander Prakash</a></h6> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="elementor-element elementor-element-3918192 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="3918192" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="125" height="125" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20125%20125'%3E%3C/svg%3E" class="attachment-full size-full" alt="shape triangle" title="Home 18" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png"><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125" src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full" alt="shape triangle" title="Home 18"></noscript></noscript></noscript></noscript> </div>
</div>
</div>
</div>
</div>
</div>
<div data-pafe-section-link="https://kreativedentistry.com/team/dr-siddharth-jain/" data-pafe-section-link-external="on" class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-37ab5ff3 elementor-invisible" data-id="37ab5ff3" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:600}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-73d360f2 elementor-widget elementor-widget-image" data-id="73d360f2" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="370" height="330" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20370%20330'%3E%3C/svg%3E" alt="Dr.sidharth-jain" class="elementor-animation-pulse-grow" title="Home 19" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/elementor/thumbs/Dr.sidharth-jain-p7byi14w3h0lb63ksc6u65d17cw3rahpm7i05h7lgk.jpg"><noscript><img width="370" height="330"  alt="Dr.sidharth-jain"  title="Home 19" data-src="https://kreativedentistry.com/wp-content/uploads/elementor/thumbs/Dr.sidharth-jain-p7byi14w3h0lb63ksc6u65d17cw3rahpm7i05h7lgk.jpg" class="elementor-animation-pulse-grow lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="370" height="330" src="https://kreativedentistry.com/wp-content/uploads/elementor/thumbs/Dr.sidharth-jain-p7byi14w3h0lb63ksc6u65d17cw3rahpm7i05h7lgk.jpg" alt="Dr.sidharth-jain" class="elementor-animation-pulse-grow" title="Home 19"></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-fdaa66d ekit-equal-height-disable elementor-widget elementor-widget-elementskit-icon-box" data-id="fdaa66d" data-element_type="widget" data-widget_type="elementskit-icon-box.default">
<div class="elementor-widget-container">
<div class="ekit-wid-con"> 

<div class="elementskit-infobox text-center text-center icon-top-align elementor-animation-   ">
<div class="elementskit-box-header">
<div class="elementskit-info-box-icon ">
<img width="47" height="39" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2047%2039'%3E%3C/svg%3E" class="attachment- size-" alt="elements 70 psychology mental health line icons MYM9N9G 3" title="Home 20" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-3.png"><noscript><img width="47" height="39"   alt="elements 70 psychology mental health line icons MYM9N9G 3" title="Home 20" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-3.png" class="attachment- size- lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="47" height="39" src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-3.png" class="attachment- size-" alt="elements 70 psychology mental health line icons MYM9N9G 3" title="Home 20"></noscript></noscript> </div>
</div>
<div class="box-body">
<h3 class="elementskit-info-box-title">
Consultant - Orthodontist </h3>
</div>
</div>
</div> </div>
</div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-5ac970 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5ac970" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-3158e1d7" data-id="3158e1d7" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-10c2d9c8 elementor-widget elementor-widget-heading" data-id="10c2d9c8" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="elementor-heading-title elementor-size-default"><a href="https://kreativedentistry.com/all_doctors/dr-siddharth-jain/">Dr. Siddharth Jain</a></h6> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="elementor-element elementor-element-f6f0072 elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="f6f0072" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="125" height="125" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20125%20125'%3E%3C/svg%3E" class="attachment-full size-full" alt="shape triangle" title="Home 18" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png"><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125" src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full" alt="shape triangle" title="Home 18"></noscript></noscript></noscript></noscript> </div>
</div>
</div>
</div>
</div>
</div>
<div data-pafe-section-link="https://kreativedentistry.com/team/dr-bharti-raheja-kakkar/" data-pafe-section-link-external="on" class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-3742b1c elementor-invisible" data-id="3742b1c" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInRight&quot;,&quot;animation_delay&quot;:600}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-6c4a0892 elementor-widget elementor-widget-image" data-id="6c4a0892" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<a href="https://kreativedentistry.com/team/dr-bharti-raheja-kakkar/" target="_blank">
<img width="370" height="330" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20370%20330'%3E%3C/svg%3E" alt="Dr Bharti - Kreative Dentistry" class="elementor-animation-pulse-grow" title="Home 22" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/elementor/thumbs/Dr-Bharti-Kreative-Dentistry-2-p7byhuk0rmrl1wd4urcg6p0t1nsj9erl9axlsjhco4.jpg"><noscript><img width="370" height="330"  alt="Dr Bharti - Kreative Dentistry"  title="Home 22" data-src="https://kreativedentistry.com/wp-content/uploads/elementor/thumbs/Dr-Bharti-Kreative-Dentistry-2-p7byhuk0rmrl1wd4urcg6p0t1nsj9erl9axlsjhco4.jpg" class="elementor-animation-pulse-grow lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="370" height="330" src="https://kreativedentistry.com/wp-content/uploads/elementor/thumbs/Dr-Bharti-Kreative-Dentistry-2-p7byhuk0rmrl1wd4urcg6p0t1nsj9erl9axlsjhco4.jpg" alt="Dr Bharti - Kreative Dentistry" class="elementor-animation-pulse-grow" title="Home 22"></noscript></noscript> </a>
</div>
</div>
</div>
<div class="elementor-element elementor-element-40483b00 ekit-equal-height-disable elementor-widget elementor-widget-elementskit-icon-box" data-id="40483b00" data-element_type="widget" data-widget_type="elementskit-icon-box.default">
<div class="elementor-widget-container">
<div class="ekit-wid-con"> 
<a href="https://kreativedentistry.com/team/dr-bharti-raheja-kakkar/" target="_blank" rel="" class="ekit_global_links">

<div class="elementskit-infobox text-center text- icon-top-align elementor-animation-   ">
<div class="elementskit-box-header">
<div class="elementskit-info-box-icon ">
<img width="50" height="54" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%2050%2054'%3E%3C/svg%3E" class="attachment- size-" alt="elements 70 psychology mental health line icons MYM9N9G 2" title="Home 23" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-2.png"><noscript><img width="50" height="54"   alt="elements 70 psychology mental health line icons MYM9N9G 2" title="Home 23" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-2.png" class="attachment- size- lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="50" height="54" src="https://kreativedentistry.com/wp-content/uploads/2021/02/elements-70-psychology-mental-health-line-icons-MYM9N9G-2.png" class="attachment- size-" alt="elements 70 psychology mental health line icons MYM9N9G 2" title="Home 23"></noscript></noscript> </div>
</div>
<div class="box-body">
<h3 class="elementskit-info-box-title">
Senior Dental Surgeon </h3>
</div>
</div>
</a>
</div> </div>
</div>
<section data-pafe-section-link="https://kreativedentistry.com/team/dr-bharti-raheja-kakkar/" data-pafe-section-link-external="on" class="elementor-section elementor-inner-section elementor-element elementor-element-2d65721b elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2d65721b" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-16954aa4" data-id="16954aa4" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-475154d4 elementor-widget elementor-widget-heading" data-id="475154d4" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="elementor-heading-title elementor-size-default"><a href="/polaris">Dr. Bharti kakkar Raheja</a></h6> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="elementor-element elementor-element-5e2673cc elementor-widget__width-auto elementor-absolute elementor-widget elementor-widget-image" data-id="5e2673cc" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<a href="https://kreativedentistry.com/team/dr-bharti-raheja-kakkar/" target="_blank">
<img width="125" height="125" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20125%20125'%3E%3C/svg%3E" class="attachment-full size-full" alt="shape triangle" title="Home 18" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png"><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125"   alt="shape triangle" title="Home 18" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img width="125" height="125" src="https://kreativedentistry.com/wp-content/uploads/2021/02/shape-triangle.png" class="attachment-full size-full" alt="shape triangle" title="Home 18"></noscript></noscript></noscript></noscript> </a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-48fdfe5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="48fdfe5" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5ab4c122" data-id="5ab4c122" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-1016aff8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1016aff8" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-7715e729" data-id="7715e729" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-4916481 elementor-widget elementor-widget-heading" data-id="4916481" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h6 class="elementor-heading-title elementor-size-default">What People Says
</h6> </div>
</div>
<div class="elementor-element elementor-element-532df27c elementor-widget elementor-widget-heading" data-id="532df27c" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Satisfied Patients</h2> </div>
</div>
<div class="elementor-element elementor-element-e20b7ce elementor-view-default elementor-widget elementor-widget-icon" data-id="e20b7ce" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<i aria-hidden="true" class="fas fa-quote-left"></i> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-26fdc08c elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="26fdc08c" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-23fdc49f" data-id="23fdc49f" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-6f6a55c8 elementor-testimonial--skin-default elementor-testimonial--layout-image_inline elementor-testimonial--align-center elementor-pagination-type-bullets elementor-widget elementor-widget-testimonial-carousel" data-id="6f6a55c8" data-element_type="widget" data-settings="{&quot;pagination&quot;:&quot;bullets&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;loop&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;space_between&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}" data-widget_type="testimonial-carousel.default">
<div class="elementor-widget-container">
<div class="elementor-swiper">
<div class="elementor-main-swiper swiper-container">
<div class="swiper-wrapper">
<div class="swiper-slide">
<div class="elementor-testimonial">
<div class="elementor-testimonial__content">
<div class="elementor-testimonial__text">
Very satisfied with his work. Very friendly and cooperative person. </div>
</div>
<div class="elementor-testimonial__footer">
<cite class="elementor-testimonial__cite"><span class="elementor-testimonial__name">Satinder Rhanna</span></cite> </div>
</div>
</div>
<div class="swiper-slide">
<div class="elementor-testimonial">
<div class="elementor-testimonial__content">
<div class="elementor-testimonial__text">
Dr. (Maj) Chander Prakash was qualified to carry out my dental
implant with a cautiously organized treatment plan, personal
care, and fellow feeling. In my opinion, Kreative Dental & Implant
Centre is the best dental clinic in Gurgaon. </div>
</div>
<div class="elementor-testimonial__footer">
<cite class="elementor-testimonial__cite"><span class="elementor-testimonial__name">Natisha Thappa</span></cite> </div>
</div>
</div>
<div class="swiper-slide">
<div class="elementor-testimonial">
<div class="elementor-testimonial__content">
<div class="elementor-testimonial__text">
Have been coming to this clinic since 2015. Extremely satisfied
with Dr. Prakash has amazing skills and patience. After
treatrnent we come for preventive and maintenance. God Bless
him and his skills. </div>
</div>
<div class="elementor-testimonial__footer">
<cite class="elementor-testimonial__cite"><span class="elementor-testimonial__name">Dr. Ramlesh Bhargava </span></cite> </div>
</div>
</div>
<div class="swiper-slide">
<div class="elementor-testimonial">
<div class="elementor-testimonial__content">
<div class="elementor-testimonial__text">
Really impressed with his knowledge, skills and dexterity. </div>
</div>
<div class="elementor-testimonial__footer">
<cite class="elementor-testimonial__cite"><span class="elementor-testimonial__name">Paramjeet Singh</span></cite> </div>
</div>
</div>
<div class="swiper-slide">
<div class="elementor-testimonial">
<div class="elementor-testimonial__content">
<div class="elementor-testimonial__text">
It was a great pleasure interacting with Dr. Major Chander
Prakash, Professionally and personally The denture was repaired
to the entire satisfaction. I look forward to future visits as and
when any dental work comes up. </div>
</div>
<div class="elementor-testimonial__footer">
<cite class="elementor-testimonial__cite"><span class="elementor-testimonial__name">Major General(Dr)M.P. Singh</span></cite> </div>
</div>
</div>
</div>
<div class="swiper-pagination"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-33d11aae elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="33d11aae" data-element_type="section">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1626e7a1" data-id="1626e7a1" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-6fed7411 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="6fed7411" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-657f2824" data-id="657f2824" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-469f4c17 elementor-widget elementor-widget-spacer" data-id="469f4c17" data-element_type="widget" data-widget_type="spacer.default">
<div class="elementor-widget-container">
<div class="elementor-spacer">
<div class="elementor-spacer-inner"></div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-685030fe" data-id="685030fe" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-9c3526c elementor-widget elementor-widget-heading" data-id="9c3526c" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Frequently</h2> </div>
</div>
<div class="elementor-element elementor-element-7cd9d8c3 elementor-widget elementor-widget-heading" data-id="7cd9d8c3" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Asked Questions​</h2> </div>
</div>
<div class="elementor-element elementor-element-23bd5340 elementor-widget elementor-widget-accordion" data-id="23bd5340" data-element_type="widget" data-widget_type="accordion.default">
<div class="elementor-widget-container">
<div class="elementor-accordion" role="tablist">
<div class="elementor-accordion-item">
<div id="elementor-tab-title-5991" class="elementor-tab-title" data-tab="1" role="tab" aria-controls="elementor-tab-content-5991" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-caret-down"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-caret-up"></i></span>
</span>
<a class="elementor-accordion-title" href="">What are the factors that cause cavities in mouth ?</a>
</div>
<div id="elementor-tab-content-5991" class="elementor-tab-content elementor-clearfix" data-tab="1" role="tabpanel" aria-labelledby="elementor-tab-title-5991"><p>Our tongue, mouth and teeth contain different types of bacteria Some bacteria are helpful, but some decay your teeth because they need sugar to create an acid that makes cavities with time and hence is the cause of tooth decay.</p><p>Factors that may increase the risk of Cavity formation in a tooth are:</p><ul><li>Poor Brushing habits</li><li>High crab food</li><li>Dry mouth</li><li>Absence of fluoride in toothpaste.</li></ul></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-5992" class="elementor-tab-title" data-tab="2" role="tab" aria-controls="elementor-tab-content-5992" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-caret-down"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-caret-up"></i></span>
</span>
<a class="elementor-accordion-title" href="">What food to eat that prevents cavities ?</a>
</div>
<div id="elementor-tab-content-5992" class="elementor-tab-content elementor-clearfix" data-tab="2" role="tabpanel" aria-labelledby="elementor-tab-title-5992"><p>Everyone should be very cautious about eating patterns throughout the day If children are drinking too many juices and sugar beverages. this will impact their tooth and weight.<br />Parents should provoke their children to eat more fruits and vegetables in their meals.<br />Everyone should adopt structured solid meals and snacking patterns instead of taking 100 percent juices and beverages all day.<br />If you still see any white scar that is a sign of loss of minerals in the tooth or any hole in your teeth. please message us. We will suggest the best cost-effective dental service along with the right choice of food for your teeth.</p></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-5993" class="elementor-tab-title" data-tab="3" role="tab" aria-controls="elementor-tab-content-5993" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-caret-down"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-caret-up"></i></span>
</span>
<a class="elementor-accordion-title" href="">What are Mouth Sores?</a>
</div>
<div id="elementor-tab-content-5993" class="elementor-tab-content elementor-clearfix" data-tab="3" role="tabpanel" aria-labelledby="elementor-tab-title-5993"><p>Painful sores like canker sores may interfere with your eating and appear on the inside of the lips, gums. tongue. roof of the mouth. or throat. They are usually harmless and heal on their<br />own after a few weeks.</p><p>Recurring sores may indicate other diseases like celiac disease. Vitamin deficiency, or other diseases. It may cause blisters too.</p><p>If the sores are:-</p><ul><li>Half n inch more massive than the standard size</li><li>Rash</li><li>Frequently ocurring</li><li>Joint pain</li><li>Diarrhoea</li></ul><p><br />kindly see your dentist as soon as possible</p></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-5994" class="elementor-tab-title" data-tab="4" role="tab" aria-controls="elementor-tab-content-5994" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-caret-down"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-caret-up"></i></span>
</span>
<a class="elementor-accordion-title" href="">How to clean your Gums and Teeth ?</a>
</div>
<div id="elementor-tab-content-5994" class="elementor-tab-content elementor-clearfix" data-tab="4" role="tabpanel" aria-labelledby="elementor-tab-title-5994"><ul><li>Use a soft fiber brush to clean your teeth.</li><li>Clean your teeth in a circular motion.</li><li>Replace your toothbrush every 3 months.</li><li>Use a tongue scraper to clean your tongue.</li><li>Use a Dental Flosser to clean leftover food in your side teeth.</li><li>Rinse after tooth floss.</li></ul></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-5995" class="elementor-tab-title" data-tab="5" role="tab" aria-controls="elementor-tab-content-5995" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-caret-down"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-caret-up"></i></span>
</span>
<a class="elementor-accordion-title" href="">What fators to take care of before cavities are formed ?</a>
</div>
<div id="elementor-tab-content-5995" class="elementor-tab-content elementor-clearfix" data-tab="5" role="tabpanel" aria-labelledby="elementor-tab-title-5995"><p>Tooth Enamel. a hard white coating holding your tooth, is very likely to affect when not cared for properly. Dental plaque may develop in the form of a thin film around the teeth. The bacteria release acid around that area. which may cause cavities. Brushing your teeth twice a day may prohibit the formation of plaque But if the cavities are formed, it is advisable to visit a doctor to fill up the cavities. It is also recommended to use fluoride gel at home, as suggested by the doctor.</p></div>
</div>
<div class="elementor-accordion-item">
<div id="elementor-tab-title-5996" class="elementor-tab-title" data-tab="6" role="tab" aria-controls="elementor-tab-content-5996" aria-expanded="false">
<span class="elementor-accordion-icon elementor-accordion-icon-right" aria-hidden="true">
<span class="elementor-accordion-icon-closed"><i class="fas fa-caret-down"></i></span>
<span class="elementor-accordion-icon-opened"><i class="fas fa-caret-up"></i></span>
</span>
<a class="elementor-accordion-title" href="">Dental Implant hurt?</a>
</div>
<div id="elementor-tab-content-5996" class="elementor-tab-content elementor-clearfix" data-tab="6" role="tabpanel" aria-labelledby="elementor-tab-title-5996"><p>Many people ask these questions.</p><ul><li>Is Dental Implant painful?</li><li>Is Dental implant Safe?</li></ul><p> </p><p>The success rate of Dental Implant is 97% for 10 years. In this process. at first a proper plan is made on the basis of your bone density and alignment. Dental implants are a good option for keeping your health and wellness. It will make your adjacent teeth less sensitive In dental implants a titanium socket is placed in the root and left to rest for 6 to 12 weeks in which the jawbone grows around the metal post. Then the artificial tooth is fixed on that socket.</p><p><br />Get the best dental implant experience in India at Kreative Dental and Implant centre.</p><p><br />Talk to our doctor if are in doubt or fear about the treatment.</p></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-73171db9 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="73171db9" data-element_type="section">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-53c80c1c" data-id="53c80c1c" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-226ab39 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="226ab39" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-2bee5f9b" data-id="2bee5f9b" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-a87ca2c elementor-widget__width-auto elementor-view-default elementor-widget elementor-widget-icon" data-id="a87ca2c" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<i aria-hidden="true" class="fas fa-map-signs"></i> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-4832b793 elementor-widget__width-auto elementor-widget elementor-widget-heading" data-id="4832b793" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default">Get Directions</h4> </div>
</div>
<div class="elementor-element elementor-element-4c95351f elementor-widget elementor-widget-heading" data-id="4c95351f" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="https://www.google.com/maps/place/Kreative+Dental+%26+Implant+Centre/@28.4117862,77.0361773,14z/data=!4m8!1m2!2m1!1skreative+dentistry!3m4!1s0x390d2281944f5877:0xd58dbbfe8b2fb68f!8m2!3d28.4219071!4d77.0521615" target="_blank" rel="nofollow noopener">Dentist Near you</a></h4> </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-5cc9a5b6" data-id="5cc9a5b6" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-17a9dc56 elementor-widget__width-auto elementor-view-default elementor-widget elementor-widget-icon" data-id="17a9dc56" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<i aria-hidden="true" class="fas fa-heartbeat"></i> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-266f00f6 elementor-widget__width-auto elementor-widget elementor-widget-heading" data-id="266f00f6" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default">Emergency Service?</h4> </div>
</div>
<div class="elementor-element elementor-element-3d7ae16 elementor-widget elementor-widget-heading" data-id="3d7ae16" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="tel:+91-9810413883">+91-9810413883</a></h4> </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-655e85ba" data-id="655e85ba" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-1ef7bfb1 elementor-widget__width-auto elementor-view-default elementor-widget elementor-widget-icon" data-id="1ef7bfb1" data-element_type="widget" data-widget_type="icon.default">
<div class="elementor-widget-container">
<div class="elementor-icon-wrapper">
<div class="elementor-icon">
<i aria-hidden="true" class="fas fa-envelope-open-text"></i> </div>
</div>
</div>
</div>
<div class="elementor-element elementor-element-2038a1e4 elementor-widget__width-auto elementor-widget elementor-widget-heading" data-id="2038a1e4" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default">For Appointment</h4> </div>
</div>
<div class="elementor-element elementor-element-4c2cb14a elementor-widget elementor-widget-heading" data-id="4c2cb14a" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h4 class="elementor-heading-title elementor-size-default"><a href="tel:+91-9810413883">+91-9810413883</a></h4> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-7949e32 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7949e32" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-90a91a2" data-id="90a91a2" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-ce479cc elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="ce479cc" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-12f630b" data-id="12f630b" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_translateY_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateY_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:2,&quot;sizes&quot;:[]},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;],&quot;motion_fx_translateY_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:100}}}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-14975d9 elementor-widget elementor-widget-heading" data-id="14975d9" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Malibu Town Clinic</h2> </div>
</div>
<div class="elementor-element elementor-element-3c64047 elementor-widget elementor-widget-text-editor" data-id="3c64047" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>LG-34, Malibu Town Shopping Complex, Sec-47, Gurugram, Haryana</p> </div>
</div>
</div>
<div class="elementor-element elementor-element-1106dc7 elementor-widget elementor-widget-heading" data-id="1106dc7" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<span class="elementor-heading-title elementor-size-default">EMERGENCY CALL:</span> </div>
</div>
<div class="elementor-element elementor-element-297e020 elementor-widget elementor-widget-heading" data-id="297e020" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<span class="elementor-heading-title elementor-size-default"><a href="tel:+91-9212220130">+91-9212220130</a></span> </div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2e780c2" data-id="2e780c2" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;motion_fx_translateY_effect&quot;:&quot;yes&quot;,&quot;motion_fx_translateY_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:2,&quot;sizes&quot;:[]},&quot;motion_fx_devices&quot;:[&quot;desktop&quot;],&quot;motion_fx_translateY_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:100}}}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-ea05e5d elementor-widget elementor-widget-heading" data-id="ea05e5d" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Sector 67 Clinic</h2> </div>
</div>
<div class="elementor-element elementor-element-23006dc elementor-widget elementor-widget-text-editor" data-id="23006dc" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>C-403, 4th Floor, M3M Urbana, Sector 67, Gurugram, Haryana 122101</p> </div>
</div>
</div>
<div class="elementor-element elementor-element-a6c948d elementor-widget elementor-widget-heading" data-id="a6c948d" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<span class="elementor-heading-title elementor-size-default">EMERGENCY CALL:</span> </div>
</div>
<div class="elementor-element elementor-element-54937ba elementor-widget elementor-widget-heading" data-id="54937ba" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<span class="elementor-heading-title elementor-size-default"><a href="tel:+91-9810413883">+91-9810413883</a></span> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="elementor-section elementor-top-section elementor-element elementor-element-88eac61 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="88eac61" data-element_type="section">
<div class="elementor-container elementor-column-gap-no">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-d0441f1" data-id="d0441f1" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-0844a6a elementor-hidden-desktop elementor-hidden-tablet elementor-widget elementor-widget-heading" data-id="0844a6a" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Malibu Town Clinic</h2> </div>
</div>
<div class="elementor-element elementor-element-5d91470 elementor-widget elementor-widget-google_maps" data-id="5d91470" data-element_type="widget" data-widget_type="google_maps.default">
<div class="elementor-widget-container">
<div class="elementor-custom-embed">
<iframe loading="lazy" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="about:blank" title="Kreative Dental &amp; Implant Centre" aria-label="Kreative Dental &amp; Implant Centre" data-rocket-lazyload="fitvidscompatible" data-lazy-src="https://maps.google.com/maps?q=Kreative%20Dental%20%26%20Implant%20Centre&#038;t=m&#038;z=14&#038;output=embed&#038;iwloc=near"></iframe><noscript><iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
					
					title="Kreative Dental &amp; Implant Centre"
					aria-label="Kreative Dental &amp; Implant Centre"
			 data-src="https://maps.google.com/maps?q=Kreative%20Dental%20%26%20Implant%20Centre&#038;t=m&#038;z=14&#038;output=embed&#038;iwloc=near" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="></iframe></noscript>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-d9c7771" data-id="d9c7771" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-40d6318 elementor-hidden-desktop elementor-hidden-tablet elementor-widget elementor-widget-heading" data-id="40d6318" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Sector 67 Clinic</h2> </div>
</div>
<div class="elementor-element elementor-element-53ebf19 elementor-widget elementor-widget-google_maps" data-id="53ebf19" data-element_type="widget" data-widget_type="google_maps.default">
<div class="elementor-widget-container">
<div class="elementor-custom-embed">
<iframe loading="lazy" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="about:blank" title="Kreative Oral Surgery" aria-label="Kreative Oral Surgery" data-rocket-lazyload="fitvidscompatible" data-lazy-src="https://maps.google.com/maps?q=Kreative%20Oral%20Surgery&#038;t=m&#038;z=14&#038;output=embed&#038;iwloc=near"></iframe><noscript><iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
					
					title="Kreative Oral Surgery"
					aria-label="Kreative Oral Surgery"
			 data-src="https://maps.google.com/maps?q=Kreative%20Oral%20Surgery&#038;t=m&#038;z=14&#038;output=embed&#038;iwloc=near" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="></iframe></noscript>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
<div class="post-tags">
</div>
</div>
<section id="comments" class="comments-area">
</section>
</main>
<div data-elementor-type="footer" data-elementor-id="60" class="elementor elementor-60 elementor-location-footer" data-elementor-settings="[]">
<div class="elementor-section-wrap">
<footer class="elementor-section elementor-top-section elementor-element elementor-element-7704515e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7704515e" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-wide">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-42c7b311" data-id="42c7b311" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-6fd54ee9 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6fd54ee9" data-element_type="section">
<div class="elementor-container elementor-column-gap-wide">
<div class="elementor-row">
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-33119c8f" data-id="33119c8f" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-4efd2a6f elementor-widget elementor-widget-image" data-id="4efd2a6f" data-element_type="widget" data-widget_type="image.default">
<div class="elementor-widget-container">
<div class="elementor-image">
<img width="300" height="84" src="data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20300%2084'%3E%3C/svg%3E" class="attachment-large size-large" alt="logo bg black" data-lazy-src="https://kreativedentistry.com/wp-content/uploads/2021/02/logo-bg-black.png" /><noscript><img width="300" height="84"   alt="logo bg black" data-src="https://kreativedentistry.com/wp-content/uploads/2021/02/logo-bg-black.png" class="attachment-large size-large lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /><noscript><img width="300" height="84" src="https://kreativedentistry.com/wp-content/uploads/2021/02/logo-bg-black.png" class="attachment-large size-large" alt="logo bg black" /></noscript></noscript> </div>
</div>
</div>
<div class="elementor-element elementor-element-3c774f98 elementor-widget elementor-widget-text-editor" data-id="3c774f98" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Dr. Chander Prakash is an Ex Major from the Army Dental Corps and Senior Residency in Safdarjung hospital (2009-12), New Delhi.</p> </div>
</div>
</div>
<div class="elementor-element elementor-element-739669b2 elementor-shape-circle e-grid-align-left e-grid-align-tablet-center elementor-grid-0 elementor-widget elementor-widget-social-icons" data-id="739669b2" data-element_type="widget" data-widget_type="social-icons.default">
<div class="elementor-widget-container">
<div class="elementor-social-icons-wrapper elementor-grid">
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon-whatsapp elementor-repeater-item-356aac0" href="https://wa.me/919810413883" target="_blank">
<span class="elementor-screen-only">Whatsapp</span>
<i class="fab fa-whatsapp"></i> </a>
</span>
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-2d9b035" href="https://www.facebook.com/kreativedentistry" target="_blank">
<span class="elementor-screen-only">Facebook</span>
<i class="fab fa-facebook"></i> </a>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-406b5943" data-id="406b5943" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-256d977d elementor-widget elementor-widget-heading" data-id="256d977d" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">Kreative Dental</h2> </div>
</div>
<div class="elementor-element elementor-element-10c100aa elementor-widget elementor-widget-text-editor" data-id="10c100aa" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>LG-34, Malibu Town Shopping Complex, Sec-47, Gurugram, Haryana</p> </div>
</div>
</div>
<div class="elementor-element elementor-element-432449ba elementor-widget elementor-widget-text-editor" data-id="432449ba" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<strong>Email ID</strong>:- <a href="/cdn-cgi/l/email-protection#5d2e282d2d322f291d362f383c29342b3839383329342e292f24733e3230"><span style="color: #ffffff;"><span class="__cf_email__" data-cfemail="30434540405f4244705b4255514459465554555e4459434442491e535f5d">[email&#160;protected]</span></span></a><br>
<strong>Phone No.</strong> :- <span style="color: #ffffff;"><a style="color: #ffffff;" href="tel:+91-9212220130">+91-9212220130</a></span> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-3338a760" data-id="3338a760" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-3c817915 elementor-widget elementor-widget-heading" data-id="3c817915" data-element_type="widget" data-widget_type="heading.default">
<div class="elementor-widget-container">
<h2 class="elementor-heading-title elementor-size-default">kreative oral surgery</h2> </div>
</div>
<div class="elementor-element elementor-element-0f2d4e1 elementor-widget elementor-widget-text-editor" data-id="0f2d4e1" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>C-403, 4th Floor, M3M Urbana, Sector 67, Gurugram, Haryana 122101</p> </div>
</div>
</div>
<div class="elementor-element elementor-element-f08ce19 elementor-widget elementor-widget-text-editor" data-id="f08ce19" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<strong>Email ID</strong>:- <span style="color: #ffffff;"><a style="color: #ffffff;" href="/cdn-cgi/l/email-protection#88fbfdf8f8e7fafcc8e3faede9fce1feedecede6fce1fbfcfaf1a6ebe7e5"><span class="__cf_email__" data-cfemail="e5969095958a9791a58e978084918c938081808b918c9691979ccb868a88">[email&#160;protected]</span></a></span>
<br>
<strong>Phone No.</strong> :- <a href="tel:+91-9810413883"><span style="color: #ffffff;">+91-9810413883</span></a> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</footer>
<section class="elementor-section elementor-top-section elementor-element elementor-element-70430c03 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="70430c03" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-56402658" data-id="56402658" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-6e574be8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6e574be8" data-element_type="section">
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-row">
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-573e0581" data-id="573e0581" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-11e405a2 elementor-widget elementor-widget-text-editor" data-id="11e405a2" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p>Copyright&nbsp;© 2021&nbsp;<span style="color: #ffffff;"><a style="color: #ffffff;" href="https://kreativedentistry.com" target="_blank" rel="noopener">Kreative Dentistry.</a></span></p> </div>
</div>
</div>
</div>
</div>
</div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-66d7440e" data-id="66d7440e" data-element_type="column">
<div class="elementor-column-wrap elementor-element-populated">
<div class="elementor-widget-wrap">
<div class="elementor-element elementor-element-8e4f41 elementor-widget elementor-widget-text-editor" data-id="8e4f41" data-element_type="widget" data-widget_type="text-editor.default">
<div class="elementor-widget-container">
<div class="elementor-text-editor elementor-clearfix">
<p><a href="#">Terms and Conditions</a>  |  <a href="#">Privacy Policy</a></p> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/wp-google-places-review-slider/public/js/wprev-public-com-min.js?ver=9.9' id='wp-google-reviews_plublic_comb-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' id='rocket-browser-checker-js-after'>
"use strict";var _createClass=function(){function defineProperties(target,props){for(var i=0;i<props.length;i++){var descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1,descriptor.configurable=!0,"value"in descriptor&&(descriptor.writable=!0),Object.defineProperty(target,descriptor.key,descriptor)}}return function(Constructor,protoProps,staticProps){return protoProps&&defineProperties(Constructor.prototype,protoProps),staticProps&&defineProperties(Constructor,staticProps),Constructor}}();function _classCallCheck(instance,Constructor){if(!(instance instanceof Constructor))throw new TypeError("Cannot call a class as a function")}var RocketBrowserCompatibilityChecker=function(){function RocketBrowserCompatibilityChecker(options){_classCallCheck(this,RocketBrowserCompatibilityChecker),this.passiveSupported=!1,this._checkPassiveOption(this),this.options=!!this.passiveSupported&&options}return _createClass(RocketBrowserCompatibilityChecker,[{key:"_checkPassiveOption",value:function(self){try{var options={get passive(){return!(self.passiveSupported=!0)}};window.addEventListener("test",null,options),window.removeEventListener("test",null,options)}catch(err){self.passiveSupported=!1}}},{key:"initRequestIdleCallback",value:function(){!1 in window&&(window.requestIdleCallback=function(cb){var start=Date.now();return setTimeout(function(){cb({didTimeout:!1,timeRemaining:function(){return Math.max(0,50-(Date.now()-start))}})},1)}),!1 in window&&(window.cancelIdleCallback=function(id){return clearTimeout(id)})}},{key:"isDataSaverModeOn",value:function(){return"connection"in navigator&&!0===navigator.connection.saveData}},{key:"supportsLinkPrefetch",value:function(){var elem=document.createElement("link");return elem.relList&&elem.relList.supports&&elem.relList.supports("prefetch")&&window.IntersectionObserver&&"isIntersecting"in IntersectionObserverEntry.prototype}},{key:"isSlowConnection",value:function(){return"connection"in navigator&&"effectiveType"in navigator.connection&&("2g"===navigator.connection.effectiveType||"slow-2g"===navigator.connection.effectiveType)}}]),RocketBrowserCompatibilityChecker}();
</script>
<script type='text/javascript' id='rocket-preload-links-js-extra'>
/* <![CDATA[ */
var RocketPreloadLinksConfig = {"excludeUris":"\/(.+\/)?feed\/?.+\/?|\/(?:.+\/)?embed\/|\/(index\\.php\/)?wp\\-json(\/.*|$)|\/wp-admin\/|\/logout\/","usesTrailingSlash":"1","imageExt":"jpg|jpeg|gif|png|tiff|bmp|webp|avif","fileExt":"jpg|jpeg|gif|png|tiff|bmp|webp|avif|php|pdf|html|htm","siteUrl":"https:\/\/kreativedentistry.com","onHoverDelay":"100","rateThrottle":"3"};
/* ]]> */
</script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' id='rocket-preload-links-js-after'>
(function() {
"use strict";var r="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},e=function(){function i(e,t){for(var n=0;n<t.length;n++){var i=t[n];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}return function(e,t,n){return t&&i(e.prototype,t),n&&i(e,n),e}}();function i(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var t=function(){function n(e,t){i(this,n),this.browser=e,this.config=t,this.options=this.browser.options,this.prefetched=new Set,this.eventTime=null,this.threshold=1111,this.numOnHover=0}return e(n,[{key:"init",value:function(){!this.browser.supportsLinkPrefetch()||this.browser.isDataSaverModeOn()||this.browser.isSlowConnection()||(this.regex={excludeUris:RegExp(this.config.excludeUris,"i"),images:RegExp(".("+this.config.imageExt+")$","i"),fileExt:RegExp(".("+this.config.fileExt+")$","i")},this._initListeners(this))}},{key:"_initListeners",value:function(e){-1<this.config.onHoverDelay&&document.addEventListener("mouseover",e.listener.bind(e),e.listenerOptions),document.addEventListener("mousedown",e.listener.bind(e),e.listenerOptions),document.addEventListener("touchstart",e.listener.bind(e),e.listenerOptions)}},{key:"listener",value:function(e){var t=e.target.closest("a"),n=this._prepareUrl(t);if(null!==n)switch(e.type){case"mousedown":case"touchstart":this._addPrefetchLink(n);break;case"mouseover":this._earlyPrefetch(t,n,"mouseout")}}},{key:"_earlyPrefetch",value:function(t,e,n){var i=this,r=setTimeout(function(){if(r=null,0===i.numOnHover)setTimeout(function(){return i.numOnHover=0},1e3);else if(i.numOnHover>i.config.rateThrottle)return;i.numOnHover++,i._addPrefetchLink(e)},this.config.onHoverDelay);t.addEventListener(n,function e(){t.removeEventListener(n,e,{passive:!0}),null!==r&&(clearTimeout(r),r=null)},{passive:!0})}},{key:"_addPrefetchLink",value:function(i){return this.prefetched.add(i.href),new Promise(function(e,t){var n=document.createElement("link");n.rel="prefetch",n.href=i.href,n.onload=e,n.onerror=t,document.head.appendChild(n)}).catch(function(){})}},{key:"_prepareUrl",value:function(e){if(null===e||"object"!==(void 0===e?"undefined":r(e))||!1 in e||-1===["http:","https:"].indexOf(e.protocol))return null;var t=e.href.substring(0,this.config.siteUrl.length),n=this._getPathname(e.href,t),i={original:e.href,protocol:e.protocol,origin:t,pathname:n,href:t+n};return this._isLinkOk(i)?i:null}},{key:"_getPathname",value:function(e,t){var n=t?e.substring(this.config.siteUrl.length):e;return n.startsWith("/")||(n="/"+n),this._shouldAddTrailingSlash(n)?n+"/":n}},{key:"_shouldAddTrailingSlash",value:function(e){return this.config.usesTrailingSlash&&!e.endsWith("/")&&!this.regex.fileExt.test(e)}},{key:"_isLinkOk",value:function(e){return null!==e&&"object"===(void 0===e?"undefined":r(e))&&(!this.prefetched.has(e.href)&&e.origin===this.config.siteUrl&&-1===e.href.indexOf("?")&&-1===e.href.indexOf("#")&&!this.regex.excludeUris.test(e.href)&&!this.regex.images.test(e.href))}}],[{key:"run",value:function(){"undefined"!=typeof RocketPreloadLinksConfig&&new n(new RocketBrowserCompatibilityChecker({capture:!0,passive:!0}),RocketPreloadLinksConfig).init()}}]),n}();t.run();
}());
</script>
<script type='text/javascript' id='happy-elementor-addons-js-extra'>
/* <![CDATA[ */
var HappyLocalize = {"ajax_url":"https:\/\/kreativedentistry.com\/wp-admin\/admin-ajax.php","nonce":"eb5162678a","pdf_js_lib":"https:\/\/kreativedentistry.com\/wp-content\/plugins\/happy-elementor-addons\/assets\/vendor\/pdfjs\/lib"};
/* ]]> */
</script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/happy-elementor-addons/assets/js/happy-addons.min.js?ver=3.4.2' id='happy-elementor-addons-js'></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/elementskit-lite/libs/framework/assets/js/frontend-script.js?ver=1642160326' id='elementskit-framework-js-frontend-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' id='elementskit-framework-js-frontend-js-after'>
		var elementskit = {
            resturl: 'https://kreativedentistry.com/wp-json/elementskit/v1/',
        }

		
</script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/elementskit-lite/widgets/init/assets/js/widget-scripts.js?ver=1642160326' id='ekit-widget-scripts-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' id='mediaelement-core-js-before'>
var mejsL10n = {"language":"en","strings":{"mejs.download-file":"Download File","mejs.install-flash":"You are using a browser that does not have Flash player enabled or installed. Please turn on your Flash player plugin or download the latest version from https:\/\/get.adobe.com\/flashplayer\/","mejs.fullscreen":"Fullscreen","mejs.play":"Play","mejs.pause":"Pause","mejs.time-slider":"Time Slider","mejs.time-help-text":"Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds.","mejs.live-broadcast":"Live Broadcast","mejs.volume-help-text":"Use Up\/Down Arrow keys to increase or decrease volume.","mejs.unmute":"Unmute","mejs.mute":"Mute","mejs.volume-slider":"Volume Slider","mejs.video-player":"Video Player","mejs.audio-player":"Audio Player","mejs.captions-subtitles":"Captions\/Subtitles","mejs.captions-chapters":"Chapters","mejs.none":"None","mejs.afrikaans":"Afrikaans","mejs.albanian":"Albanian","mejs.arabic":"Arabic","mejs.belarusian":"Belarusian","mejs.bulgarian":"Bulgarian","mejs.catalan":"Catalan","mejs.chinese":"Chinese","mejs.chinese-simplified":"Chinese (Simplified)","mejs.chinese-traditional":"Chinese (Traditional)","mejs.croatian":"Croatian","mejs.czech":"Czech","mejs.danish":"Danish","mejs.dutch":"Dutch","mejs.english":"English","mejs.estonian":"Estonian","mejs.filipino":"Filipino","mejs.finnish":"Finnish","mejs.french":"French","mejs.galician":"Galician","mejs.german":"German","mejs.greek":"Greek","mejs.haitian-creole":"Haitian Creole","mejs.hebrew":"Hebrew","mejs.hindi":"Hindi","mejs.hungarian":"Hungarian","mejs.icelandic":"Icelandic","mejs.indonesian":"Indonesian","mejs.irish":"Irish","mejs.italian":"Italian","mejs.japanese":"Japanese","mejs.korean":"Korean","mejs.latvian":"Latvian","mejs.lithuanian":"Lithuanian","mejs.macedonian":"Macedonian","mejs.malay":"Malay","mejs.maltese":"Maltese","mejs.norwegian":"Norwegian","mejs.persian":"Persian","mejs.polish":"Polish","mejs.portuguese":"Portuguese","mejs.romanian":"Romanian","mejs.russian":"Russian","mejs.serbian":"Serbian","mejs.slovak":"Slovak","mejs.slovenian":"Slovenian","mejs.spanish":"Spanish","mejs.swahili":"Swahili","mejs.swedish":"Swedish","mejs.tagalog":"Tagalog","mejs.thai":"Thai","mejs.turkish":"Turkish","mejs.ukrainian":"Ukrainian","mejs.vietnamese":"Vietnamese","mejs.welsh":"Welsh","mejs.yiddish":"Yiddish"}};
</script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-includes/js/mediaelement/mediaelement-and-player.min.js?ver=4.2.16' id='mediaelement-core-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-includes/js/mediaelement/mediaelement-migrate.min.js?ver=5.9' id='mediaelement-migrate-js'></script>
<script type='text/javascript' id='mediaelement-js-extra'>
/* <![CDATA[ */
var _wpmejsSettings = {"pluginPath":"\/wp-includes\/js\/mediaelement\/","classPrefix":"mejs-","stretching":"responsive"};
/* ]]> */
</script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-includes/js/mediaelement/wp-mediaelement.min.js?ver=5.9' id='wp-mediaelement-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-includes/js/imagesloaded.min.js?ver=4.1.4' id='imagesloaded-js'></script>
<script type='text/javascript' id='epic-script-js-extra'>
/* <![CDATA[ */
var epicoption = {"prefix":"epic_module_ajax_","rtl":"0","admin_bar":"0"};
/* ]]> */
</script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/epic-news-element/assets/js/script.min.js' id='epic-script-js'></script>
<script type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/wp-smushit/app/assets/js/smush-lazy-load.min.js?ver=3.9.5' id='smush-lazy-load-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/js/webpack.runtime.min.js?ver=3.5.5' id='elementor-webpack-runtime-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/js/frontend-modules.min.js?ver=3.5.5' id='elementor-frontend-modules-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min.js?ver=4.0.2' id='elementor-waypoints-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-includes/js/jquery/ui/core.min.js?ver=1.13.0' id='jquery-ui-core-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/lib/swiper/swiper.min.js?ver=5.3.6' id='swiper-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/lib/share-link/share-link.min.js?ver=3.5.5' id='share-link-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/lib/dialog/dialog.min.js?ver=4.9.0' id='elementor-dialog-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' id='elementor-frontend-js-before'>
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Extra","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Extra","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.5.5","is_static":false,"experimentalFeatures":{"e_import_export":true,"e_hidden_wordpress_widgets":true,"theme_builder_v2":true,"landing-pages":true,"elements-color-picker":true,"favorite-widgets":true,"admin-top-bar":true,"form-submissions":true},"urls":{"assets":"https:\/\/kreativedentistry.com\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":109,"title":"Best%20Dentist%20in%20Gurgaon%20-%20India%27s%20Best%20Maxillofacial%20surgeon","excerpt":"","featuredImage":false}};
</script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/js/frontend.min.js?ver=3.5.5' id='elementor-frontend-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' id='elementor-frontend-js-after'>
var jkit_ajax_url = "https://kreativedentistry.com/?jkit-ajax-request=jkit_elements", jkit_nonce = "1c7d5d7ced";
</script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/jeg-elementor-kit/assets/js/elements/sticky-element.js?ver=1642160326' id='jkit-sticky-element-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor-pro/assets/lib/smartmenus/jquery.smartmenus.min.js?ver=1.0.1' id='smartmenus-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/dethemekit-for-elementor/assets/js/lib/ResizeSensor.min.js?ver=1.7.0' id='de-resize-sensor-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/dethemekit-for-elementor/assets/js/lib/sticky-sidebar/sticky-sidebar.min.js?ver=3.3.1' id='de-sticky-sidebar-js'></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/dethemekit-for-elementor/assets/js/lib/jsticky/jquery.jsticky.js?ver=1642160326' id='jsticky-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor-pro/assets/js/webpack-pro.runtime.min.js?ver=3.5.2' id='elementor-pro-webpack-runtime-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' id='elementor-pro-frontend-js-before'>
var ElementorProFrontendConfig = {"ajaxurl":"https:\/\/kreativedentistry.com\/wp-admin\/admin-ajax.php","nonce":"cc6d21e720","urls":{"assets":"https:\/\/kreativedentistry.com\/wp-content\/plugins\/elementor-pro\/assets\/","rest":"https:\/\/kreativedentistry.com\/wp-json\/"},"i18n":{"toc_no_headings_found":"No headings were found on this page."},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"}},"facebook_sdk":{"lang":"en_US","app_id":""},"lottie":{"defaultAnimationUrl":"https:\/\/kreativedentistry.com\/wp-content\/plugins\/elementor-pro\/modules\/lottie\/assets\/animations\/default.json"}};
</script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor-pro/assets/js/frontend.min.js?ver=3.5.2' id='elementor-pro-frontend-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor-pro/assets/js/preloaded-elements-handlers.min.js?ver=3.5.2' id='pro-preloaded-elements-handlers-js'></script>
<script type='text/javascript' id='de-sticky-frontend-js-extra'>
/* <![CDATA[ */
var DeStickySettings = {"elements_data":{"sections":[],"columns":[]}};
/* ]]> */
</script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/dethemekit-for-elementor/assets/js/de-sticky-frontend.js?ver=1642160326' id='de-sticky-frontend-js'></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/dethemekit-for-elementor/assets/js/de-active-icon-box.js?ver=1642160326' id='de-active-icon-box-js'></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/elementskit-lite/widgets/init/assets/js/animate-circle.js?ver=1642160326' id='animate-circle-js'></script>
<script type='text/javascript' id='elementskit-elementor-js-extra'>
/* <![CDATA[ */
var ekit_config = {"ajaxurl":"https:\/\/kreativedentistry.com\/wp-admin\/admin-ajax.php","nonce":"d82feb461c"};
/* ]]> */
</script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/elementskit-lite/widgets/init/assets/js/elementor.js?ver=1642160326' id='elementskit-elementor-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor/assets/js/preloaded-modules.min.js?ver=3.5.5' id='preloaded-modules-js'></script>
<script type="rocketlazyloadscript" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/plugins/elementor-pro/assets/lib/sticky/jquery.sticky.min.js?ver=3.5.2' id='e-sticky-js'></script>
<script type="rocketlazyloadscript" data-minify="1" data-rocket-type='text/javascript' defer='defer' src='https://kreativedentistry.com/wp-content/cache/min/1/wp-content/plugins/epic-news-element/assets/js/admin/elementor-frontend.js?ver=1642160326' id='selectize-js'></script>
<style>@media (max-width:767px) { .pafe-sticky-header-fixed-start-on-mobile { position: fixed !important; top: 0; width: 100%; z-index: 99; } .pafe-display-inline-block-mobile {display: inline-block; margin-bottom: 0; width: auto !important; } } @media (min-width:768px) and (max-width:1024px) { .pafe-sticky-header-fixed-start-on-tablet { position: fixed !important; top: 0; width: 100%; z-index: 99; } .pafe-display-inline-block-tablet {display: inline-block; margin-bottom: 0; width: auto !important; }} @media (min-width:1025px) { .pafe-sticky-header-fixed-start-on-desktop { position: fixed !important; top: 0; width: 100%; z-index: 99; } .pafe-display-inline-block-desktop {display: inline-block; margin-bottom: 0; width: auto !important; } }</style><div class="pafe-break-point" data-pafe-break-point-md="768" data-pafe-break-point-lg="1025" data-pafe-ajax-url="https://kreativedentistry.com/wp-admin/admin-ajax.php"></div><div class="pswp pafe-lightbox-modal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="pswp__bg"></div>
<div class="pswp__scroll-wrap">
<div class="pswp__container">
<div class="pswp__item"></div>
<div class="pswp__item"></div>
<div class="pswp__item"></div>
</div>
<div class="pswp__ui pswp__ui--hidden">
<div class="pswp__top-bar">
<div class="pswp__counter"></div>
<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
<button class="pswp__button pswp__button--share" title="Share"></button>
<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
<div class="pswp__preloader">
<div class="pswp__preloader__icn">
<div class="pswp__preloader__cut">
<div class="pswp__preloader__donut"></div>
</div>
</div>
</div>
</div>

<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
<div class="pswp__share-tooltip">

</div>
</div>
<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
<div class="pswp__caption">
<div class="pswp__caption__center">
</div>
</div>
</div>
</div>
</div>
<script type="rocketlazyloadscript" data-rocket-type="text/javascript">
  !function(a,b){"function"==typeof define&&define.amd?define(b):"object"==typeof exports?module.exports=b():a.PhotoSwipeUI_Default=b()}(this,function(){"use strict";var a=function(a,b){var c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v=this,w=!1,x=!0,y=!0,z={barsSize:{top:44,bottom:"auto"},closeElClasses:["item","caption","zoom-wrap","ui","top-bar"],timeToIdle:4e3,timeToIdleOutside:1e3,loadingIndicatorDelay:1e3,addCaptionHTMLFn:function(a,b){return a.title?(b.children[0].innerHTML=a.title,!0):(b.children[0].innerHTML="",!1)},closeEl:!0,captionEl:!0,fullscreenEl:!0,zoomEl:!0,shareEl:!0,counterEl:!0,arrowEl:!0,preloaderEl:!0,tapToClose:!1,tapToToggleControls:!0,clickToCloseNonZoomable:!0,shareButtons:[{id:"facebook",label:"Share on Facebook",url:"https://www.facebook.com/sharer/sharer.php?u={{url}}"},{id:"twitter",label:"Tweet",url:"https://twitter.com/intent/tweet?text={{text}}&url={{url}}"},{id:"pinterest",label:"Pin it",url:"http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}"},{id:"download",label:"Download image",url:"{{raw_image_url}}",download:!0}],getImageURLForShare:function(){return a.currItem.src||""},getPageURLForShare:function(){return window.location.href},getTextForShare:function(){return a.currItem.title||""},indexIndicatorSep:" / ",fitControlsWidth:1200},A=function(a){if(r)return!0;a=a||window.event,q.timeToIdle&&q.mouseUsed&&!k&&K();for(var c,d,e=a.target||a.srcElement,f=e.getAttribute("class")||"",g=0;g<S.length;g++)c=S[g],c.onTap&&f.indexOf("pswp__"+c.name)>-1&&(c.onTap(),d=!0);if(d){a.stopPropagation&&a.stopPropagation(),r=!0;var h=b.features.isOldAndroid?600:30;s=setTimeout(function(){r=!1},h)}},B=function(){return!a.likelyTouchDevice||q.mouseUsed||screen.width>q.fitControlsWidth},C=function(a,c,d){b[(d?"add":"remove")+"Class"](a,"pswp__"+c)},D=function(){var a=1===q.getNumItemsFn();a!==p&&(C(d,"ui--one-slide",a),p=a)},E=function(){C(i,"share-modal--hidden",y)},F=function(){return y=!y,y?(b.removeClass(i,"pswp__share-modal--fade-in"),setTimeout(function(){y&&E()},300)):(E(),setTimeout(function(){y||b.addClass(i,"pswp__share-modal--fade-in")},30)),y||H(),!1},G=function(b){b=b||window.event;var c=b.target||b.srcElement;return a.shout("shareLinkClick",b,c),!!c.href&&(!!c.hasAttribute("download")||(window.open(c.href,"pswp_share","scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,top=100,left="+(window.screen?Math.round(screen.width/2-275):100)),y||F(),!1))},H=function(){for(var a,b,c,d,e,f="",g=0;g<q.shareButtons.length;g++)a=q.shareButtons[g],c=q.getImageURLForShare(a),d=q.getPageURLForShare(a),e=q.getTextForShare(a),b=a.url.replace("{{url}}",encodeURIComponent(d)).replace("{{image_url}}",encodeURIComponent(c)).replace("{{raw_image_url}}",c).replace("{{text}}",encodeURIComponent(e)),f+='<a href="'+b+'" target="_blank" class="pswp__share--'+a.id+'"'+(a.download?"download":"")+">"+a.label+"</a>",q.parseShareButtonOut&&(f=q.parseShareButtonOut(a,f));i.children[0].innerHTML=f,i.children[0].onclick=G},I=function(a){for(var c=0;c<q.closeElClasses.length;c++)if(b.hasClass(a,"pswp__"+q.closeElClasses[c]))return!0},J=0,K=function(){clearTimeout(u),J=0,k&&v.setIdle(!1)},L=function(a){a=a?a:window.event;var b=a.relatedTarget||a.toElement;b&&"HTML"!==b.nodeName||(clearTimeout(u),u=setTimeout(function(){v.setIdle(!0)},q.timeToIdleOutside))},M=function(){q.fullscreenEl&&!b.features.isOldAndroid&&(c||(c=v.getFullscreenAPI()),c?(b.bind(document,c.eventK,v.updateFullscreen),v.updateFullscreen(),b.addClass(a.template,"pswp--supports-fs")):b.removeClass(a.template,"pswp--supports-fs"))},N=function(){q.preloaderEl&&(O(!0),l("beforeChange",function(){clearTimeout(o),o=setTimeout(function(){a.currItem&&a.currItem.loading?(!a.allowProgressiveImg()||a.currItem.img&&!a.currItem.img.naturalWidth)&&O(!1):O(!0)},q.loadingIndicatorDelay)}),l("imageLoadComplete",function(b,c){a.currItem===c&&O(!0)}))},O=function(a){n!==a&&(C(m,"preloader--active",!a),n=a)},P=function(a){var c=a.vGap;if(B()){var g=q.barsSize;if(q.captionEl&&"auto"===g.bottom)if(f||(f=b.createEl("pswp__caption pswp__caption--fake"),f.appendChild(b.createEl("pswp__caption__center")),d.insertBefore(f,e),b.addClass(d,"pswp__ui--fit")),q.addCaptionHTMLFn(a,f,!0)){var h=f.clientHeight;c.bottom=parseInt(h,10)||44}else c.bottom=g.top;else c.bottom="auto"===g.bottom?0:g.bottom;c.top=g.top}else c.top=c.bottom=0},Q=function(){q.timeToIdle&&l("mouseUsed",function(){b.bind(document,"mousemove",K),b.bind(document,"mouseout",L),t=setInterval(function(){J++,2===J&&v.setIdle(!0)},q.timeToIdle/2)})},R=function(){l("onVerticalDrag",function(a){x&&a<.95?v.hideControls():!x&&a>=.95&&v.showControls()});var a;l("onPinchClose",function(b){x&&b<.9?(v.hideControls(),a=!0):a&&!x&&b>.9&&v.showControls()}),l("zoomGestureEnded",function(){a=!1,a&&!x&&v.showControls()})},S=[{name:"caption",option:"captionEl",onInit:function(a){e=a}},{name:"share-modal",option:"shareEl",onInit:function(a){i=a},onTap:function(){F()}},{name:"button--share",option:"shareEl",onInit:function(a){h=a},onTap:function(){F()}},{name:"button--zoom",option:"zoomEl",onTap:a.toggleDesktopZoom},{name:"counter",option:"counterEl",onInit:function(a){g=a}},{name:"button--close",option:"closeEl",onTap:a.close},{name:"button--arrow--left",option:"arrowEl",onTap:a.prev},{name:"button--arrow--right",option:"arrowEl",onTap:a.next},{name:"button--fs",option:"fullscreenEl",onTap:function(){c.isFullscreen()?c.exit():c.enter()}},{name:"preloader",option:"preloaderEl",onInit:function(a){m=a}}],T=function(){var a,c,e,f=function(d){if(d)for(var f=d.length,g=0;g<f;g++){a=d[g],c=a.className;for(var h=0;h<S.length;h++)e=S[h],c.indexOf("pswp__"+e.name)>-1&&(q[e.option]?(b.removeClass(a,"pswp__element--disabled"),e.onInit&&e.onInit(a)):b.addClass(a,"pswp__element--disabled"))}};f(d.children);var g=b.getChildByClass(d,"pswp__top-bar");g&&f(g.children)};v.init=function(){b.extend(a.options,z,!0),q=a.options,d=b.getChildByClass(a.scrollWrap,"pswp__ui"),l=a.listen,R(),l("beforeChange",v.update),l("doubleTap",function(b){var c=a.currItem.initialZoomLevel;a.getZoomLevel()!==c?a.zoomTo(c,b,333):a.zoomTo(q.getDoubleTapZoom(!1,a.currItem),b,333)}),l("preventDragEvent",function(a,b,c){var d=a.target||a.srcElement;d&&d.getAttribute("class")&&a.type.indexOf("mouse")>-1&&(d.getAttribute("class").indexOf("__caption")>0||/(SMALL|STRONG|EM)/i.test(d.tagName))&&(c.prevent=!1)}),l("bindEvents",function(){b.bind(d,"pswpTap click",A),b.bind(a.scrollWrap,"pswpTap",v.onGlobalTap),a.likelyTouchDevice||b.bind(a.scrollWrap,"mouseover",v.onMouseOver)}),l("unbindEvents",function(){y||F(),t&&clearInterval(t),b.unbind(document,"mouseout",L),b.unbind(document,"mousemove",K),b.unbind(d,"pswpTap click",A),b.unbind(a.scrollWrap,"pswpTap",v.onGlobalTap),b.unbind(a.scrollWrap,"mouseover",v.onMouseOver),c&&(b.unbind(document,c.eventK,v.updateFullscreen),c.isFullscreen()&&(q.hideAnimationDuration=0,c.exit()),c=null)}),l("destroy",function(){q.captionEl&&(f&&d.removeChild(f),b.removeClass(e,"pswp__caption--empty")),i&&(i.children[0].onclick=null),b.removeClass(d,"pswp__ui--over-close"),b.addClass(d,"pswp__ui--hidden"),v.setIdle(!1)}),q.showAnimationDuration||b.removeClass(d,"pswp__ui--hidden"),l("initialZoomIn",function(){q.showAnimationDuration&&b.removeClass(d,"pswp__ui--hidden")}),l("initialZoomOut",function(){b.addClass(d,"pswp__ui--hidden")}),l("parseVerticalMargin",P),T(),q.shareEl&&h&&i&&(y=!0),D(),Q(),M(),N()},v.setIdle=function(a){k=a,C(d,"ui--idle",a)},v.update=function(){x&&a.currItem?(v.updateIndexIndicator(),q.captionEl&&(q.addCaptionHTMLFn(a.currItem,e),C(e,"caption--empty",!a.currItem.title)),w=!0):w=!1,y||F(),D()},v.updateFullscreen=function(d){d&&setTimeout(function(){a.setScrollOffset(0,b.getScrollY())},50),b[(c.isFullscreen()?"add":"remove")+"Class"](a.template,"pswp--fs")},v.updateIndexIndicator=function(){q.counterEl&&(g.innerHTML=a.getCurrentIndex()+1+q.indexIndicatorSep+q.getNumItemsFn())},v.onGlobalTap=function(c){c=c||window.event;var d=c.target||c.srcElement;if(!r)if(c.detail&&"mouse"===c.detail.pointerType){if(I(d))return void a.close();b.hasClass(d,"pswp__img")&&(1===a.getZoomLevel()&&a.getZoomLevel()<=a.currItem.fitRatio?q.clickToCloseNonZoomable&&a.close():a.toggleDesktopZoom(c.detail.releasePoint))}else if(q.tapToToggleControls&&(x?v.hideControls():v.showControls()),q.tapToClose&&(b.hasClass(d,"pswp__img")||I(d)))return void a.close()},v.onMouseOver=function(a){a=a||window.event;var b=a.target||a.srcElement;C(d,"ui--over-close",I(b))},v.hideControls=function(){b.addClass(d,"pswp__ui--hidden"),x=!1},v.showControls=function(){x=!0,w||v.update(),b.removeClass(d,"pswp__ui--hidden")},v.supportsFullscreen=function(){var a=document;return!!(a.exitFullscreen||a.mozCancelFullScreen||a.webkitExitFullscreen||a.msExitFullscreen)},v.getFullscreenAPI=function(){var b,c=document.documentElement,d="fullscreenchange";return c.requestFullscreen?b={enterK:"requestFullscreen",exitK:"exitFullscreen",elementK:"fullscreenElement",eventK:d}:c.mozRequestFullScreen?b={enterK:"mozRequestFullScreen",exitK:"mozCancelFullScreen",elementK:"mozFullScreenElement",eventK:"moz"+d}:c.webkitRequestFullscreen?b={enterK:"webkitRequestFullscreen",exitK:"webkitExitFullscreen",elementK:"webkitFullscreenElement",eventK:"webkit"+d}:c.msRequestFullscreen&&(b={enterK:"msRequestFullscreen",exitK:"msExitFullscreen",elementK:"msFullscreenElement",eventK:"MSFullscreenChange"}),b&&(b.enter=function(){return j=q.closeOnScroll,q.closeOnScroll=!1,"webkitRequestFullscreen"!==this.enterK?a.template[this.enterK]():void a.template[this.enterK](Element.ALLOW_KEYBOARD_INPUT)},b.exit=function(){return q.closeOnScroll=j,document[this.exitK]()},b.isFullscreen=function(){return document[this.elementK]}),b}};return a});

    (function() {

    var initPhotoSwipeFromDOM = function(gallerySelector) {

      var parseThumbnailElements = function(el) {
          var thumbElements = el.childNodes,
              numNodes = thumbElements.length,
              items = [],
              el,
              childElements,
              thumbnailEl,
              size,
              item;

          for(var i = 0; i < numNodes; i++) {
              el = thumbElements[i];

              // include only element nodes 
              if(el.nodeType !== 1) {
                continue;
              }

              childElements = el.children;

              size = el.getAttribute('data-size').split('x');

              // create slide object
              item = {
            src: el.getAttribute('data-href'),
            w: parseInt(size[0], 10),
            h: parseInt(size[1], 10),
            author: el.getAttribute('data-author')
              };

              item.el = el; // save link to element for getThumbBoundsFn

              if(childElements.length > 0) {
                item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                if(childElements.length > 1) {
                    item.title = childElements[1].innerHTML; // caption (contents of figure)
                }
              }


          var mediumSrc = el.getAttribute('data-med');
                if(mediumSrc) {
                  size = el.getAttribute('data-med-size').split('x');
                  // "medium-sized" image
                  item.m = {
                      src: mediumSrc,
                      w: parseInt(size[0], 10),
                      h: parseInt(size[1], 10)
                  };
                }
                // original image
                item.o = {
                  src: item.src,
                  w: item.w,
                  h: item.h
                };

              items.push(item);
          }

          return items;
      };

      // find nearest parent element
      var closest = function closest(el, fn) {
          return el && ( fn(el) ? el : closest(el.parentNode, fn) );
      };

      var onThumbnailsClick = function(e) {
          e = e || window.event;
          e.preventDefault ? e.preventDefault() : e.returnValue = false;

          var eTarget = e.target || e.srcElement;

          var clickedListItem = closest(eTarget, function(el) {
              return el.tagName === 'A';
          });

          if(!clickedListItem) {
              return;
          }

          var clickedGallery = clickedListItem.parentNode;

          var childNodes = clickedListItem.parentNode.childNodes,
              numChildNodes = childNodes.length,
              nodeIndex = 0,
              index;

          for (var i = 0; i < numChildNodes; i++) {
              if(childNodes[i].nodeType !== 1) { 
                  continue; 
              }

              if(childNodes[i] === clickedListItem) {
                  index = nodeIndex;
                  break;
              }
              nodeIndex++;
          }

          if(index >= 0) {
              openPhotoSwipe( index, clickedGallery );
          }
          return false;
      };

      var photoswipeParseHash = function() {
        var hash = window.location.hash.substring(1),
          params = {};

          if(hash.length < 5) { // pid=1
              return params;
          }

          var vars = hash.split('&');
          for (var i = 0; i < vars.length; i++) {
              if(!vars[i]) {
                  continue;
              }
              var pair = vars[i].split('=');  
              if(pair.length < 2) {
                  continue;
              }           
              params[pair[0]] = pair[1];
          }

          if(params.gid) {
            params.gid = parseInt(params.gid, 10);
          }

          return params;
      };

      var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
          var pswpElement = document.querySelectorAll('.pswp')[0],
              gallery,
              options,
              items,
              shareButtonsArray = [];

        items = parseThumbnailElements(galleryElement);

          if (galleryElement.getAttribute('data-pafe-lightbox-gallery-facebook')=='yes') {
            shareButtonsArray.push({id:'facebook', label:'Share on Facebook', url:'https://www.facebook.com/sharer/sharer.php?u={{url}}'});
          }

          if (galleryElement.getAttribute('data-pafe-lightbox-gallery-tweeter')=='yes') {
            shareButtonsArray.push({id:'twitter', label:'Tweet', url:'https://twitter.com/intent/tweet?text={{text}}&url={{url}}'});
          }

          if (galleryElement.getAttribute('data-pafe-lightbox-gallery-pinterest')=='yes') {
            shareButtonsArray.push({id:'pinterest', label:'Pin it', url:'http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}'});
          }

          if (galleryElement.getAttribute('data-pafe-lightbox-gallery-download-image')=='yes') {
            shareButtonsArray.push({id:'download', label:'Download image', url:'{{raw_image_url}}', download:true});
          }

          // define options (if needed)
          options = {

              galleryUID: galleryElement.getAttribute('data-pswp-uid'),
              bgOpacity: galleryElement.getAttribute('data-pafe-lightbox-gallery-background-opacity'),
              shareButtons: shareButtonsArray,
              getThumbBoundsFn: function(index) {
                  // See Options->getThumbBoundsFn section of docs for more info
                  var thumbnail = items[index].el.children[0],
                      pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                      rect = thumbnail.getBoundingClientRect(); 

                  return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
              },

              addCaptionHTMLFn: function(item, captionEl, isFake) {
            if(!item.title) {
              captionEl.children[0].innerText = '';
              return false;
            }
            captionEl.children[0].innerHTML = item.title;
            //captionEl.children[0].innerHTML = item.title +  '<br/><small>Photo: ' + item.author + '</small>';
            return true;
              }
          
          };


          if(fromURL) {
            if(options.galleryPIDs) {
              // parse real index when custom PIDs are used 
              // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
              for(var j = 0; j < items.length; j++) {
                if(items[j].pid == index) {
                  options.index = j;
                  break;
                }
              }
            } else {
              options.index = parseInt(index, 10) - 1;
            }
          } else {
            options.index = parseInt(index, 10);
          }

          // exit if index not found
          if( isNaN(options.index) ) {
            return;
          }



        var radios = document.getElementsByName('gallery-style');
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                if(radios[i].id == 'radio-all-controls') {

                } else if(radios[i].id == 'radio-minimal-black') {
                  options.mainClass = 'pswp--minimal--dark';
                  options.barsSize = {top:0,bottom:0};
              options.captionEl = false;
              options.fullscreenEl = false;
              options.shareEl = false;
              options.bgOpacity = 0.85;
              options.tapToClose = true;
              options.tapToToggleControls = false;
                }
                break;
            }
        }

          if(disableAnimation) {
              options.showAnimationDuration = 0;
          }

          // Pass data to PhotoSwipe and initialize it
          gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);

          // see: http://photoswipe.com/documentation/responsive-images.html
        var realViewportWidth,
            useLargeImages = false,
            firstResize = true,
            imageSrcWillChange;

        gallery.listen('beforeResize', function() {

          var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio : 1;
          dpiRatio = Math.min(dpiRatio, 2.5);
            realViewportWidth = gallery.viewportSize.x * dpiRatio;


            if(realViewportWidth >= 1200 || (!gallery.likelyTouchDevice && realViewportWidth > 800) || screen.width > 1200 ) {
              if(!useLargeImages) {
                useLargeImages = true;
                  imageSrcWillChange = true;
              }
                
            } else {
              if(useLargeImages) {
                useLargeImages = false;
                  imageSrcWillChange = true;
              }
            }

            if(imageSrcWillChange && !firstResize) {
                gallery.invalidateCurrItems();
            }

            if(firstResize) {
                firstResize = false;
            }

            imageSrcWillChange = false;

        });

        gallery.listen('gettingData', function(index, item) {
            if( useLargeImages ) {
                item.src = item.o.src;
                item.w = item.o.w;
                item.h = item.o.h;
            } else {
                item.src = item.m.src;
                item.w = item.m.w;
                item.h = item.m.h;
            }
        });

          gallery.init();
      };

      // select all gallery elements
      var galleryElements = document.querySelectorAll( gallerySelector );
      for(var i = 0, l = galleryElements.length; i < l; i++) {
        galleryElements[i].setAttribute('data-pswp-uid', i+1);
        galleryElements[i].onclick = onThumbnailsClick;
      }

      // Parse URL and open gallery if it contains #&pid=3&gid=1
      var hashData = photoswipeParseHash();
      if(hashData.pid && hashData.gid) {
        openPhotoSwipe( hashData.pid,  galleryElements[ hashData.gid - 1 ], true, true );
      }
    };

    initPhotoSwipeFromDOM('.pafe-lightbox');
    initPhotoSwipeFromDOM('.pafe-lightbox-gallery .gallery');

  })();

  </script><div data-pafe-form-builder-tinymce-upload="https://kreativedentistry.com/wp-content/plugins/piotnet-addons-for-elementor-pro/inc/tinymce/tinymce-upload.php"></div><div data-pafe-ajax-url="https://kreativedentistry.com/wp-admin/admin-ajax.php"></div><script>window.lazyLoadOptions={elements_selector:"img[data-lazy-src],.rocket-lazyload,iframe[data-lazy-src]",data_src:"lazy-src",data_srcset:"lazy-srcset",data_sizes:"lazy-sizes",class_loading:"lazyloading",class_loaded:"lazyloaded",threshold:300,callback_loaded:function(element){if(element.tagName==="IFRAME"&&element.dataset.rocketLazyload=="fitvidscompatible"){if(element.classList.contains("lazyloaded")){if(typeof window.jQuery!="undefined"){if(jQuery.fn.fitVids){jQuery(element).parent().fitVids()}}}}}};window.addEventListener('LazyLoad::Initialized',function(e){var lazyLoadInstance=e.detail.instance;if(window.MutationObserver){var observer=new MutationObserver(function(mutations){var image_count=0;var iframe_count=0;var rocketlazy_count=0;mutations.forEach(function(mutation){for(var i=0;i<mutation.addedNodes.length;i++){if(typeof mutation.addedNodes[i].getElementsByTagName!=='function'){continue}
if(typeof mutation.addedNodes[i].getElementsByClassName!=='function'){continue}
images=mutation.addedNodes[i].getElementsByTagName('img');is_image=mutation.addedNodes[i].tagName=="IMG";iframes=mutation.addedNodes[i].getElementsByTagName('iframe');is_iframe=mutation.addedNodes[i].tagName=="IFRAME";rocket_lazy=mutation.addedNodes[i].getElementsByClassName('rocket-lazyload');image_count+=images.length;iframe_count+=iframes.length;rocketlazy_count+=rocket_lazy.length;if(is_image){image_count+=1}
if(is_iframe){iframe_count+=1}}});if(image_count>0||iframe_count>0||rocketlazy_count>0){lazyLoadInstance.update()}});var b=document.getElementsByTagName("body")[0];var config={childList:!0,subtree:!0};observer.observe(b,config)}},!1)</script><script data-no-minify="1" async src="https://kreativedentistry.com/wp-content/plugins/wp-rocket/assets/js/lazyload/17.5/lazyload.min.js"></script><script>function lazyLoadThumb(e){var t='<img data-lazy-src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"><noscript><img  alt="" width="480" height="360" data-src="https://i.ytimg.com/vi/ID/hqdefault.jpg" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><img src="https://i.ytimg.com/vi/ID/hqdefault.jpg" alt="" width="480" height="360"></noscript></noscript>',a='<button class="play" aria-label="play Youtube video"></button>';return t.replace("ID",e)+a}function lazyLoadYoutubeIframe(){var e=document.createElement("iframe"),t="ID?autoplay=1";t+=0===this.parentNode.dataset.query.length?'':'&'+this.parentNode.dataset.query;e.setAttribute("src",t.replace("ID",this.parentNode.dataset.src)),e.setAttribute("frameborder","0"),e.setAttribute("allowfullscreen","1"),e.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"),this.parentNode.parentNode.replaceChild(e,this.parentNode)}document.addEventListener("DOMContentLoaded",function(){var e,t,p,a=document.getElementsByClassName("rll-youtube-player");for(t=0;t<a.length;t++)e=document.createElement("div"),e.setAttribute("data-id",a[t].dataset.id),e.setAttribute("data-query", a[t].dataset.query),e.setAttribute("data-src", a[t].dataset.src),e.innerHTML=lazyLoadThumb(a[t].dataset.id),a[t].appendChild(e),p=e.querySelector('.play'),p.onclick=lazyLoadYoutubeIframe});</script>
<script>class RocketElementorAnimation{constructor(){this.deviceMode=document.createElement("span"),this.deviceMode.id="elementor-device-mode",this.deviceMode.setAttribute("class","elementor-screen-only"),document.body.appendChild(this.deviceMode)}_detectAnimations(){let t=getComputedStyle(this.deviceMode,":after").content.replace(/"/g,"");this.animationSettingKeys=this._listAnimationSettingsKeys(t),document.querySelectorAll(".elementor-invisible[data-settings]").forEach(t=>{const e=t.getBoundingClientRect();if(e.bottom>=0&&e.top<=window.innerHeight)try{this._animateElement(t)}catch(t){}})}_animateElement(t){const e=JSON.parse(t.dataset.settings),i=e._animation_delay||e.animation_delay||0,n=e[this.animationSettingKeys.find(t=>e[t])];if("none"===n)return void t.classList.remove("elementor-invisible");t.classList.remove(n),this.currentAnimation&&t.classList.remove(this.currentAnimation),this.currentAnimation=n;let s=setTimeout(()=>{t.classList.remove("elementor-invisible"),t.classList.add("animated",n),this._removeAnimationSettings(t,e)},i);window.addEventListener("rocket-startLoading",function(){clearTimeout(s)})}_listAnimationSettingsKeys(t="mobile"){const e=[""];switch(t){case"mobile":e.unshift("_mobile");case"tablet":e.unshift("_tablet");case"desktop":e.unshift("_desktop")}const i=[];return["animation","_animation"].forEach(t=>{e.forEach(e=>{i.push(t+e)})}),i}_removeAnimationSettings(t,e){this._listAnimationSettingsKeys().forEach(t=>delete e[t]),t.dataset.settings=JSON.stringify(e)}static run(){const t=new RocketElementorAnimation;requestAnimationFrame(t._detectAnimations.bind(t))}}document.addEventListener("DOMContentLoaded",RocketElementorAnimation.run);</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6df8f06f9c782ce9","version":"2021.12.0","r":1,"token":"a9c2520208ee430cba50f98fc77027be","si":100}' crossorigin="anonymous"></script>
</body>
</html>
