define("ace/mode/less_highlight_rules","require exports module ace/lib/oop ace/lib/lang ace/mode/text_highlight_rules".split(" "),function(d,s,r){r=d("../lib/oop");var p=d("../lib/lang");d=d("./text_highlight_rules").TextHighlightRules;var b=function(){var c=p.arrayToMap(function(){for(var a="-webkit- -moz- -o- -ms- -svg- -pie- -khtml-".split(" "),c="appearance background-clip background-inline-policy background-origin background-size binding border-bottom-colors border-left-colors border-right-colors border-top-colors border-end border-end-color border-end-style border-end-width border-image border-start border-start-color border-start-style border-start-width box-align box-direction box-flex box-flexgroup box-ordinal-group box-orient box-pack box-sizing column-count column-gap column-width column-rule column-rule-width column-rule-style column-rule-color float-edge font-feature-settings font-language-override force-broken-image-icon image-region margin-end margin-start opacity outline outline-color outline-offset outline-radius outline-radius-bottomleft outline-radius-bottomright outline-radius-topleft outline-radius-topright outline-style outline-width padding-end padding-start stack-sizing tab-size text-blink text-decoration-color text-decoration-line text-decoration-style transform transform-origin transition transition-delay transition-duration transition-property transition-timing-function user-focus user-input user-modify user-select window-shadow border-radius".split(" "),
f=[],m=0,e=a.length;m<e;m++)Array.prototype.push.apply(f,(a[m]+c.join("|"+a[m])).split("|"));Array.prototype.push.apply(f,c);Array.prototype.push.apply(f,"azimuth background-attachment background-color background-image background-position background-repeat background border-bottom-color border-bottom-style border-bottom-width border-bottom border-collapse border-color border-left-color border-left-style border-left-width border-left border-right-color border-right-style border-right-width border-right border-spacing border-style border-top-color border-top-style border-top-width border-top border-width border bottom box-sizing caption-side clear clip color content counter-increment counter-reset cue-after cue-before cue cursor direction display elevation empty-cells float font-family font-size-adjust font-size font-stretch font-style font-variant font-weight font height left letter-spacing line-height list-style-image list-style-position list-style-type list-style margin-bottom margin-left margin-right margin-top marker-offset margin marks max-height max-width min-height min-width opacity orphans outline-color outline-style outline-width outline overflow overflow-x overflow-y padding-bottom padding-left padding-right padding-top padding page-break-after page-break-before page-break-inside page pause-after pause-before pause pitch-range pitch play-during position quotes richness right size speak-header speak-numeral speak-punctuation speech-rate speak stress table-layout text-align text-decoration text-indent text-shadow text-transform top unicode-bidi vertical-align visibility voice-family volume white-space widows width word-spacing z-index".split(" "));
return f}()),b=p.arrayToMap("hsl hsla rgb rgba url attr counter counters lighten darken saturate desaturate fadein fadeout fade spin mix hue saturation lightness alpha round ceil floor percentage color iscolor isnumber isstring iskeyword isurl ispixel ispercentage isem".split(" ")),d=p.arrayToMap("absolute all-scroll always armenian auto baseline below bidi-override block bold bolder border-box both bottom break-all break-word capitalize center char circle cjk-ideographic col-resize collapse content-box crosshair dashed decimal-leading-zero decimal default disabled disc distribute-all-lines distribute-letter distribute-space distribute dotted double e-resize ellipsis fixed georgian groove hand hebrew help hidden hiragana-iroha hiragana horizontal ideograph-alpha ideograph-numeric ideograph-parenthesis ideograph-space inactive inherit inline-block inline inset inside inter-ideograph inter-word italic justify katakana-iroha katakana keep-all left lighter line-edge line-through line list-item loose lower-alpha lower-greek lower-latin lower-roman lowercase lr-tb ltr medium middle move n-resize ne-resize newspaper no-drop no-repeat nw-resize none normal not-allowed nowrap oblique outset outside overline pointer progress relative repeat-x repeat-y repeat right ridge row-resize rtl s-resize scroll se-resize separate small-caps solid square static strict super sw-resize table-footer-group table-header-group tb-rl text-bottom text-top text thick thin top transparent underline upper-alpha upper-latin upper-roman uppercase vertical-ideographic vertical-text visible w-resize wait whitespace zero".split(" ")),
a=p.arrayToMap("aqua black blue fuchsia gray green lime maroon navy olive orange purple red silver teal white yellow".split(" ")),h=p.arrayToMap("@mixin @extend @include @import @media @debug @warn @if @for @each @while @else @font-face @-webkit-keyframes if and !default module def end declare when not and".split(" ")),n=p.arrayToMap("a abbr acronym address applet area article aside audio b base basefont bdo big blockquote body br button canvas caption center cite code col colgroup command datalist dd del details dfn dir div dl dt em embed fieldset figcaption figure font footer form frame frameset h1 h2 h3 h4 h5 h6 head header hgroup hr html i iframe img input ins keygen kbd label legend li link map mark menu meta meter nav noframes noscript object ol optgroup option output p param pre progress q rp rt ruby s samp script section select small source span strike strong style sub summary sup table tbody td textarea tfoot th thead time title tr tt u ul var video wbr xmp".split(" "));
this.$rules={start:[{token:"comment",regex:"\\/\\/.*$"},{token:"comment",regex:"\\/\\*",next:"comment"},{token:"string",regex:'["](?:(?:\\\\.)|(?:[^"\\\\]))*?["]'},{token:"string",regex:"['](?:(?:\\\\.)|(?:[^'\\\\]))*?[']"},{token:"constant.numeric",regex:"\\-?(?:(?:[0-9]+)|(?:[0-9]*\\.[0-9]+))(?:em|ex|px|cm|mm|in|pt|pc|deg|rad|grad|ms|s|hz|khz|%)"},{token:"constant.numeric",regex:"#[a-f0-9]{6}"},{token:"constant.numeric",regex:"#[a-f0-9]{3}"},{token:"constant.numeric",regex:"\\-?(?:(?:[0-9]+)|(?:[0-9]*\\.[0-9]+))"},
{token:function(a){return h.hasOwnProperty(a)?"keyword":"variable"},regex:"@[a-z0-9_\\-@]*\\b"},{token:function(q){return c.hasOwnProperty(q.toLowerCase())?"support.type":h.hasOwnProperty(q)?"keyword":d.hasOwnProperty(q)?"constant.language":b.hasOwnProperty(q)?"support.function":a.hasOwnProperty(q.toLowerCase())?"support.constant.color":n.hasOwnProperty(q.toLowerCase())?"variable.language":"text"},regex:"\\-?[@a-z_][@a-z0-9_\\-]*"},{token:"variable.language",regex:"#[a-z0-9-_]+"},{token:"variable.language",
regex:"\\.[a-z0-9-_]+"},{token:"variable.language",regex:":[a-z_][a-z0-9-_]*"},{token:"constant",regex:"[a-z0-9-_]+"},{token:"keyword.operator",regex:"<|>|<=|>=|==|!=|-|%|#|\\+|\\$|\\+|\\*"},{token:"paren.lparen",regex:"[[({]"},{token:"paren.rparen",regex:"[\\])}]"},{token:"text",regex:"\\s+"},{caseInsensitive:!0}],comment:[{token:"comment",regex:".*?\\*\\/",next:"start"},{token:"comment",regex:".+"}]}};r.inherits(b,d);s.LessHighlightRules=b});
define("ace/mode/matching_brace_outdent",["require","exports","module","ace/range"],function(d,s,r){var p=d("../range").Range;d=function(){};(function(){this.checkOutdent=function(b,c){return/^\s+$/.test(b)?/^\s*\}/.test(c):!1};this.autoOutdent=function(b,c){var d=b.getLine(c).match(/^(\s*\})/);if(!d)return 0;var d=d[1].length,k=b.findMatchingBracket({row:c,column:d});if(!k||k.row==c)return 0;k=this.$getIndent(b.getLine(k.row));b.replace(new p(c,0,c,d-1),k)};this.$getIndent=function(b){return b.match(/^\s*/)[0]}}).call(d.prototype);
s.MatchingBraceOutdent=d});
define("ace/mode/behaviour/cstyle","require exports module ace/lib/oop ace/mode/behaviour ace/token_iterator ace/lib/lang".split(" "),function(d,s,r){r=d("../../lib/oop");var p=d("../behaviour").Behaviour,b=d("../../token_iterator").TokenIterator,c=d("../../lib/lang"),u=["text","paren.rparen","punctuation.operator"],k=["text","paren.rparen","punctuation.operator","comment"],a,h={},n=function(f){var m=-1;f.multiSelect&&(m=f.selection.index,h.rangeCount!=f.multiSelect.rangeCount&&(h={rangeCount:f.multiSelect.rangeCount}));
if(h[m])return a=h[m];a=h[m]={autoInsertedBrackets:0,autoInsertedRow:-1,autoInsertedLineEnd:"",maybeInsertedBrackets:0,maybeInsertedRow:-1,maybeInsertedLineStart:"",maybeInsertedLineEnd:""}},q=function(f,m,e,a){var g=f.end.row-f.start.row;return{text:e+m+a,selection:[0,f.start.column+1,g,f.end.column+(g?0:1)]}},l=function(){this.add("braces","insertion",function(f,m,e,t,g){f=e.getCursorPosition();m=t.doc.getLine(f.row);if("{"==g){n(e);g=e.getSelectionRange();var b=t.doc.getTextRange(g);if(""!==b&&
"{"!==b&&e.getWrapBehavioursEnabled())return q(g,b,"{","}");if(l.isSaneInsertion(e,t)){if(/[\]\}\)]/.test(m[f.column])||e.inMultiSelectMode)return l.recordAutoInsert(e,t,"}"),{text:"{}",selection:[1,1]};l.recordMaybeInsert(e,t,"{");return{text:"{",selection:[1,1]}}}else if("}"==g){if(n(e),b=m.substring(f.column,f.column+1),"}"==b&&null!==t.$findOpeningBracket("}",{column:f.column+1,row:f.row})&&l.isAutoInsertedClosing(f,m,g))return l.popAutoInsertedClosing(),{text:"",selection:[1,1]}}else{if("\n"==
g||"\r\n"==g){n(e);e="";l.isMaybeInsertedClosing(f,m)&&(e=c.stringRepeat("}",a.maybeInsertedBrackets),l.clearMaybeInsertedClosing());b=m.substring(f.column,f.column+1);if("}"===b){f=t.findMatchingBracket({row:f.row,column:f.column+1},"}");if(!f)return null;f=this.$getIndent(t.getLine(f.row))}else if(e)f=this.$getIndent(m);else{l.clearMaybeInsertedClosing();return}t=f+t.getTabString();return{text:"\n"+t+"\n"+f+e,selection:[1,t.length,1,t.length]}}l.clearMaybeInsertedClosing()}});this.add("braces",
"deletion",function(f,m,e,b,g){f=b.doc.getTextRange(g);if(!g.isMultiLine()&&"{"==f){n(e);if("}"==b.doc.getLine(g.start.row).substring(g.end.column,g.end.column+1))return g.end.column++,g;a.maybeInsertedBrackets--}});this.add("parens","insertion",function(f,m,e,a,g){if("("==g){n(e);g=e.getSelectionRange();f=a.doc.getTextRange(g);if(""!==f&&e.getWrapBehavioursEnabled())return q(g,f,"(",")");if(l.isSaneInsertion(e,a))return l.recordAutoInsert(e,a,")"),{text:"()",selection:[1,1]}}else if(")"==g&&(n(e),
e=e.getCursorPosition(),f=a.doc.getLine(e.row),")"==f.substring(e.column,e.column+1)&&null!==a.$findOpeningBracket(")",{column:e.column+1,row:e.row})&&l.isAutoInsertedClosing(e,f,g)))return l.popAutoInsertedClosing(),{text:"",selection:[1,1]}});this.add("parens","deletion",function(f,a,e,b,g){f=b.doc.getTextRange(g);if(!g.isMultiLine()&&"("==f&&(n(e),")"==b.doc.getLine(g.start.row).substring(g.start.column+1,g.start.column+2)))return g.end.column++,g});this.add("brackets","insertion",function(f,a,
e,b,g){if("["==g){n(e);g=e.getSelectionRange();f=b.doc.getTextRange(g);if(""!==f&&e.getWrapBehavioursEnabled())return q(g,f,"[","]");if(l.isSaneInsertion(e,b))return l.recordAutoInsert(e,b,"]"),{text:"[]",selection:[1,1]}}else if("]"==g&&(n(e),e=e.getCursorPosition(),f=b.doc.getLine(e.row),"]"==f.substring(e.column,e.column+1)&&null!==b.$findOpeningBracket("]",{column:e.column+1,row:e.row})&&l.isAutoInsertedClosing(e,f,g)))return l.popAutoInsertedClosing(),{text:"",selection:[1,1]}});this.add("brackets",
"deletion",function(f,a,e,b,g){f=b.doc.getTextRange(g);if(!g.isMultiLine()&&"["==f&&(n(e),"]"==b.doc.getLine(g.start.row).substring(g.start.column+1,g.start.column+2)))return g.end.column++,g});this.add("string_dquotes","insertion",function(f,a,e,b,g){if('"'==g||"'"==g){n(e);f=e.getSelectionRange();a=b.doc.getTextRange(f);if(""!==a&&"'"!==a&&'"'!=a&&e.getWrapBehavioursEnabled())return q(f,a,g,g);if(!a){a=e.getCursorPosition();f=b.doc.getLine(a.row);e=f.substring(a.column-1,a.column);f=f.substring(a.column,
a.column+1);var c=b.getTokenAt(a.row,a.column);a=b.getTokenAt(a.row,a.column+1);if("\\"==e&&c&&/escape/.test(c.type))return null;c=c&&/string|escape/.test(c.type);a=!a||/string|escape/.test(a.type);if(f==g)b=c!==a;else{if(c&&!a||c&&a)return null;a=b.$mode.tokenRe;a.lastIndex=0;b=a.test(e);a.lastIndex=0;e=a.test(e);if(b||e||f&&!/[\s;,.})\]\\]/.test(f))return null;b=!0}return{text:b?g+g:"",selection:[1,1]}}}});this.add("string_dquotes","deletion",function(a,b,e,c,g){a=c.doc.getTextRange(g);if(!g.isMultiLine()&&
('"'==a||"'"==a)&&(n(e),c.doc.getLine(g.start.row).substring(g.start.column+1,g.start.column+2)==a))return g.end.column++,g})};l.isSaneInsertion=function(a,c){var e=a.getCursorPosition(),h=new b(c,e.row,e.column);if(!this.$matchTokenType(h.getCurrentToken()||"text",u)){var g=new b(c,e.row,e.column+1);if(!this.$matchTokenType(g.getCurrentToken()||"text",u))return!1}h.stepForward();return h.getCurrentTokenRow()!==e.row||this.$matchTokenType(h.getCurrentToken()||"text",k)};l.$matchTokenType=function(a,
b){return-1<b.indexOf(a.type||a)};l.recordAutoInsert=function(f,b,e){f=f.getCursorPosition();b=b.doc.getLine(f.row);this.isAutoInsertedClosing(f,b,a.autoInsertedLineEnd[0])||(a.autoInsertedBrackets=0);a.autoInsertedRow=f.row;a.autoInsertedLineEnd=e+b.substr(f.column);a.autoInsertedBrackets++};l.recordMaybeInsert=function(b,c,e){b=b.getCursorPosition();c=c.doc.getLine(b.row);this.isMaybeInsertedClosing(b,c)||(a.maybeInsertedBrackets=0);a.maybeInsertedRow=b.row;a.maybeInsertedLineStart=c.substr(0,b.column)+
e;a.maybeInsertedLineEnd=c.substr(b.column);a.maybeInsertedBrackets++};l.isAutoInsertedClosing=function(b,c,e){return 0<a.autoInsertedBrackets&&b.row===a.autoInsertedRow&&e===a.autoInsertedLineEnd[0]&&c.substr(b.column)===a.autoInsertedLineEnd};l.isMaybeInsertedClosing=function(b,c){return 0<a.maybeInsertedBrackets&&b.row===a.maybeInsertedRow&&c.substr(b.column)===a.maybeInsertedLineEnd&&c.substr(0,b.column)==a.maybeInsertedLineStart};l.popAutoInsertedClosing=function(){a.autoInsertedLineEnd=a.autoInsertedLineEnd.substr(1);
a.autoInsertedBrackets--};l.clearMaybeInsertedClosing=function(){a&&(a.maybeInsertedBrackets=0,a.maybeInsertedRow=-1)};r.inherits(l,p);s.CstyleBehaviour=l});
define("ace/mode/behaviour/css","require exports module ace/lib/oop ace/mode/behaviour ace/mode/behaviour/cstyle ace/token_iterator".split(" "),function(d,s,r){r=d("../../lib/oop");d("../behaviour");var p=d("./cstyle").CstyleBehaviour,b=d("../../token_iterator").TokenIterator;d=function(){this.inherit(p);this.add("colon","insertion",function(c,d,k,a,h){if(":"===h&&(c=k.getCursorPosition(),d=new b(a,c.row,c.column),(k=d.getCurrentToken())&&k.value.match(/\s+/)&&(k=d.stepBackward()),k&&"support.type"===
k.type)){a=a.doc.getLine(c.row);if(":"===a.substring(c.column,c.column+1))return{text:"",selection:[1,1]};if(!a.substring(c.column).match(/^\s*;/))return{text:":;",selection:[1,1]}}});this.add("colon","deletion",function(c,d,k,a,h){c=a.doc.getTextRange(h);if(!h.isMultiLine()&&":"===c&&(k=k.getCursorPosition(),k=new b(a,k.row,k.column),(c=k.getCurrentToken())&&c.value.match(/\s+/)&&(c=k.stepBackward()),c&&"support.type"===c.type&&";"===a.doc.getLine(h.start.row).substring(h.end.column,h.end.column+
1)))return h.end.column++,h});this.add("semicolon","insertion",function(b,d,k,a,h){if(";"===h&&(b=k.getCursorPosition(),";"===a.doc.getLine(b.row).substring(b.column,b.column+1)))return{text:"",selection:[1,1]}})};r.inherits(d,p);s.CssBehaviour=d});
define("ace/mode/folding/cstyle","require exports module ace/lib/oop ace/range ace/mode/folding/fold_mode".split(" "),function(d,s,r){r=d("../../lib/oop");var p=d("../../range").Range;d=d("./fold_mode").FoldMode;s=s.FoldMode=function(b){b&&(this.foldingStartMarker=new RegExp(this.foldingStartMarker.source.replace(/\|[^|]*?$/,"|"+b.start)),this.foldingStopMarker=new RegExp(this.foldingStopMarker.source.replace(/\|[^|]*?$/,"|"+b.end)))};r.inherits(s,d);(function(){this.foldingStartMarker=/(\{|\[)[^\}\]]*$|^\s*(\/\*)/;
this.foldingStopMarker=/^[^\[\{]*(\}|\])|^[\s\*]*(\*\/)/;this.singleLineBlockCommentRe=/^\s*(\/\*).*\*\/\s*$/;this.tripleStarBlockCommentRe=/^\s*(\/\*\*\*).*\*\/\s*$/;this.startRegionRe=/^\s*(\/\*|\/\/)#?region\b/;this._getFoldWidgetBase=this.getFoldWidget;this.getFoldWidget=function(b,c,d){var k=b.getLine(d);if(this.singleLineBlockCommentRe.test(k)&&!this.startRegionRe.test(k)&&!this.tripleStarBlockCommentRe.test(k))return"";b=this._getFoldWidgetBase(b,c,d);return!b&&this.startRegionRe.test(k)?"start":
b};this.getFoldWidgetRange=function(b,c,d,k){var a=b.getLine(d);if(this.startRegionRe.test(a))return this.getCommentRegionBlock(b,a,d);var h=a.match(this.foldingStartMarker);if(h){a=h.index;if(h[1])return this.openingBracketBlock(b,h[1],d,a);(h=b.getCommentFoldRange(d,a+h[0].length,1))&&!h.isMultiLine()&&(k?h=this.getSectionRange(b,d):"all"!=c&&(h=null));return h}if("markbegin"!==c&&(h=a.match(this.foldingStopMarker)))return a=h.index+h[0].length,h[1]?this.closingBracketBlock(b,h[1],d,a):b.getCommentFoldRange(d,
a,-1)};this.getSectionRange=function(b,c){for(var d=b.getLine(c),k=d.search(/\S/),a=c,h=d.length,n=c+=1,q=b.getLength();++c<q;)if(d=b.getLine(c),d=d.search(/\S/),-1!==d){if(k>d)break;var l=this.getFoldWidgetRange(b,"all",c);if(l)if(l.start.row<=a)break;else if(l.isMultiLine())c=l.end.row;else if(k==d)break;n=c}return new p(a,h,n,b.getLine(n).length)};this.getCommentRegionBlock=function(b,c,d){for(var k=c.search(/\s*$/),a=b.getLength(),h=d,n=/^\s*(?:\/\*|\/\/|--)#?(end)?region\b/,q=1;++d<a;){c=b.getLine(d);
var l=n.exec(c);if(l&&(l[1]?q--:q++,!q))break}b=d;if(b>h)return new p(h,k,b,c.length)}}).call(s.prototype)});
define("ace/mode/less","require exports module ace/lib/oop ace/mode/text ace/mode/less_highlight_rules ace/mode/matching_brace_outdent ace/mode/behaviour/css ace/mode/folding/cstyle".split(" "),function(d,s,r){r=d("../lib/oop");var p=d("./text").Mode,b=d("./less_highlight_rules").LessHighlightRules,c=d("./matching_brace_outdent").MatchingBraceOutdent,u=d("./behaviour/css").CssBehaviour,k=d("./folding/cstyle").FoldMode;d=function(){this.HighlightRules=b;this.$outdent=new c;this.$behaviour=new u;this.foldingRules=
new k};r.inherits(d,p);(function(){this.lineCommentStart="//";this.blockComment={start:"/*",end:"*/"};this.getNextLineIndent=function(a,b,d){var c=this.$getIndent(b);a=this.getTokenizer().getLineTokens(b,a).tokens;if(a.length&&"comment"==a[a.length-1].type)return c;b.match(/^.*\{\s*$/)&&(c+=d);return c};this.checkOutdent=function(a,b,c){return this.$outdent.checkOutdent(b,c)};this.autoOutdent=function(a,b,c){this.$outdent.autoOutdent(b,c)};this.$id="ace/mode/less"}).call(d.prototype);s.Mode=d});