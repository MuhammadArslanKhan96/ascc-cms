!function(){var e={98:function(){},321:function(e,t,n){var r=n(98);r.__esModule&&(r=r.default),"string"==typeof r&&(r=[[e.id,r,""]]),r.locals&&(e.exports=r.locals),(0,n(673).Z)("d8bd3bc0",r,!0,{})},673:function(e,t,n){"use strict";function r(e,t){for(var n=[],r={},s=0;s<t.length;s++){var o=t[s],a=o[0],i={id:e+":"+s,css:o[1],media:o[2],sourceMap:o[3]};r[a]?r[a].parts.push(i):n.push(r[a]={id:a,parts:[i]})}return n}n.d(t,{Z:function(){return h}});var s="undefined"!=typeof document;if("undefined"!=typeof DEBUG&&DEBUG&&!s)throw new Error("vue-style-loader cannot be used in a non-browser environment. Use { target: 'node' } in your Webpack config to indicate a server-rendering environment.");var o={},a=s&&(document.head||document.getElementsByTagName("head")[0]),i=null,l=0,d=!1,u=function(){},c=null,f="data-vue-ssr-id",p="undefined"!=typeof navigator&&/msie [6-9]\b/.test(navigator.userAgent.toLowerCase());function h(e,t,n,s){d=n,c=s||{};var a=r(e,t);return v(a),function(t){for(var n=[],s=0;s<a.length;s++){var i=a[s];(l=o[i.id]).refs--,n.push(l)}for(t?v(a=r(e,t)):a=[],s=0;s<n.length;s++){var l;if(0===(l=n[s]).refs){for(var d=0;d<l.parts.length;d++)l.parts[d]();delete o[l.id]}}}}function v(e){for(var t=0;t<e.length;t++){var n=e[t],r=o[n.id];if(r){r.refs++;for(var s=0;s<r.parts.length;s++)r.parts[s](n.parts[s]);for(;s<n.parts.length;s++)r.parts.push(C(n.parts[s]));r.parts.length>n.parts.length&&(r.parts.length=n.parts.length)}else{var a=[];for(s=0;s<n.parts.length;s++)a.push(C(n.parts[s]));o[n.id]={id:n.id,refs:1,parts:a}}}}function m(){var e=document.createElement("style");return e.type="text/css",a.appendChild(e),e}function C(e){var t,n,r=document.querySelector("style["+f+'~="'+e.id+'"]');if(r){if(d)return u;r.parentNode.removeChild(r)}if(p){var s=l++;r=i||(i=m()),t=B.bind(null,r,s,!1),n=B.bind(null,r,s,!0)}else r=m(),t=b.bind(null,r),n=function(){r.parentNode.removeChild(r)};return t(e),function(r){if(r){if(r.css===e.css&&r.media===e.media&&r.sourceMap===e.sourceMap)return;t(e=r)}else n()}}var g,y=(g=[],function(e,t){return g[e]=t,g.filter(Boolean).join("\n")});function B(e,t,n,r){var s=n?"":r.css;if(e.styleSheet)e.styleSheet.cssText=y(t,s);else{var o=document.createTextNode(s),a=e.childNodes;a[t]&&e.removeChild(a[t]),a.length?e.insertBefore(o,a[t]):e.appendChild(o)}}function b(e,t){var n=t.css,r=t.media,s=t.sourceMap;if(r&&e.setAttribute("media",r),c.ssrId&&e.setAttribute(f,t.id),s&&(n+="\n/*# sourceURL="+s.sources[0]+" */",n+="\n/*# sourceMappingURL=data:application/json;base64,"+btoa(unescape(encodeURIComponent(JSON.stringify(s))))+" */"),e.styleSheet)e.styleSheet.cssText=n;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(n))}}}},t={};function n(r){var s=t[r];if(void 0!==s)return s.exports;var o=t[r]={id:r,exports:{}};return e[r](o,o.exports,n),o.exports}n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,{a:t}),t},n.d=function(e,t){for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){"use strict";var e;n(321),e=jQuery,Craft.AccountSettingsForm=Garnish.Base.extend({userId:null,isCurrent:null,$copyPasswordResetUrlBtn:null,$copyImpersonationUrlBtn:null,$actionBtn:null,confirmDeleteModal:null,$deleteBtn:null,init:function(t,n,r){this.userId=t,this.isCurrent=n,this.setSettings(r,Craft.AccountSettingsForm.defaults),this.$copyPasswordResetUrlBtn=e("#copy-passwordreset-url"),this.$copyImpersonationUrlBtn=e("#copy-impersonation-url"),this.$actionBtn=e("#action-menubtn"),this.$deleteBtn=e("#delete-btn"),this.addListener(this.$copyPasswordResetUrlBtn,"click","handleCopyPasswordResetUrlBtnClick"),this.addListener(this.$copyImpersonationUrlBtn,"click","handleCopyImpersonationUrlBtnClick"),this.addListener(this.$deleteBtn,"click","showConfirmDeleteModal")},handleCopyPasswordResetUrlBtnClick:function(){Craft.elevatedSessionManager.requireElevatedSession(this.getPasswordResetUrl.bind(this))},getPasswordResetUrl:function(){var e=this;this.$actionBtn.addClass("loading");var t={userId:this.userId};Craft.sendActionRequest("POST","users/get-password-reset-url",{data:t}).then((function(t){e.$actionBtn.removeClass("loading"),Craft.ui.createCopyTextPrompt({label:Craft.t("app","Copy the activation URL"),value:t.data.url})})).catch((function(t){t.response,e.$actionBtn.removeClass("loading")}))},handleCopyImpersonationUrlBtnClick:function(){var e=this;this.$actionBtn.addClass("loading");var t={userId:this.userId};Craft.sendActionRequest("POST","users/get-impersonation-url",{data:t}).then((function(t){e.$actionBtn.removeClass("loading"),Craft.ui.createCopyTextPrompt({label:Craft.t("app","Copy the impersonation URL, and open it in a new private window."),value:t.data.url})})).catch((function(t){t.response,e.$actionBtn.removeClass("loading")}))},showConfirmDeleteModal:function(){var e=this;if(this.confirmDeleteModal)this.confirmDeleteModal.show();else{this.$actionBtn.addClass("loading");var t={userId:this.userId};Craft.sendActionRequest("POST","users/user-content-summary",{data:t}).then((function(t){e.$actionBtn.removeClass("loading"),e.confirmDeleteModal=new Craft.DeleteUserModal(e.userId,{contentSummary:t.data,redirect:e.settings.deleteModalRedirect})})).catch((function(t){t.response,e.$actionBtn.removeClass("loading")}))}}},{defaults:{deleteModalRedirect:null}})}()}();
//# sourceMappingURL=AccountSettingsForm.js.map