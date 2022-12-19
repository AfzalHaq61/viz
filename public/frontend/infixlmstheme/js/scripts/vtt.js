var WebVTTParser=function(){this.parse=function(e,t){var n=Date.now(),a=0,i=e.split(/\r\n|\r|\n/),r=!1,s=[],l=[];function o(e,t){l.push({message:e,line:a+1,col:t})}var u=i[a],f=u.length,c="WEBVTT",m=0,p=c.length;for("\ufeff"===u[0]&&(p+=m=1),(f<p||u.indexOf(c)!==0+m||p<f&&" "!==u[p]&&"\t"!==u[p])&&o('No valid signature. (File needs to start with "WEBVTT".)'),a++;""!=i[a]&&null!=i[a];){if(o("No blank line after the signature."),-1!=i[a].indexOf("--\x3e")){r=!0;break}a++}for(;null!=i[a];){for(var d;!r&&""==i[a];)a++;if(!r&&null==i[a])break;d={id:"",startTime:0,endTime:0,pauseOnExit:!1,direction:"horizontal",snapToLines:!0,linePosition:"auto",textPosition:50,size:100,alignment:"middle",text:"",tree:null};var g=!0;if(-1==i[a].indexOf("--\x3e")){if(d.id=i[a],/^NOTE($|[ \t])/.test(d.id)){for(a++;""!=i[a]&&null!=i[a];)-1!=i[a].indexOf("--\x3e")&&o("Cannot have timestamp in a comment."),a++;continue}if(""==i[++a]||null==i[a]){o("Cue identifier cannot be standalone.");continue}-1==i[a].indexOf("--\x3e")&&(g=!1,o("Cue identifier needs to be followed by timestamp."))}r=!1;var v=new WebVTTCueTimingsAndSettingsParser(i[a],o),h=0;if(0<s.length&&(h=s[s.length-1].startTime),!g||v.parse(d,h)){for(a++;""!=i[a]&&null!=i[a];){if(-1!=i[a].indexOf("--\x3e")){o("Blank line missing before cue."),r=!0;break}""!=d.text&&(d.text+="\n"),d.text+=i[a],a++}var T=new WebVTTCueTextParser(d.text,o,t);d.tree=T.parse(d.startTime,d.endTime),s.push(d)}else for(d=null,a++;""!=i[a]&&null!=i[a];){if(-1!=i[a].indexOf("--\x3e")){r=!0;break}a++}}return s.sort(function(e,t){return e.startTime<t.startTime?-1:e.startTime>t.startTime?1:e.endTime>t.endTime?-1:e.endTime<t.endTime?1:0}),{cues:s,errors:l,time:Date.now()-n}}},WebVTTCueTimingsAndSettingsParser=function(r,t){var o=/[\u0020\t\f]/,n=/[^\u0020\t\f]/,s=(r=r,0),u=function(e){t(e,s+1)};function a(e){for(;null!=r[s]&&e.test(r[s]);)s++}function l(e){for(var t="";null!=r[s]&&e.test(r[s]);)t+=r[s],s++;return t}function i(){var e,t,n,a,i="minutes";if(null!=r[s])if(/\d/.test(r[s]))if((2<(e=l(/\d/)).length||59<parseInt(e,10))&&(i="hours"),":"==r[s])if(s++,2==(t=l(/\d/)).length){if("hours"==i||":"==r[s]){if(":"!=r[s])return void u("No seconds found or minutes is greater than 59.");if(s++,2!=(n=l(/\d/)).length)return void u("Must be exactly two digits.")}else n=t,t=e,e="0";if("."==r[s])if(s++,3==(a=l(/\d/)).length)if(59<parseInt(t,10))u("You cannot have more than 59 minutes.");else{if(!(59<parseInt(n,10)))return 60*parseInt(e,10)*60+60*parseInt(t,10)+parseInt(n,10)+parseInt(a,10)/1e3;u("You cannot have more than 59 seconds.")}else u("Milliseconds must be given in three digits.");else u('No decimal separator (".") found.')}else u("Must be exactly two digits.");else u("No time unit separator found.");else u("Timestamp must start with a character in the range 0-9.");else u("No timestamp found.")}this.parse=function(e,t){if(a(o),e.startTime=i(),null!=e.startTime)if(e.startTime<t&&u("Start timestamp is not greater than or equal to start timestamp of previous cue."),n.test(r[s])&&u("Timestamp not separated from '--\x3e' by whitespace."),a(o),"-"==r[s])if("-"==r[++s])if(">"==r[++s]){if(s++,n.test(r[s])&&u("'--\x3e' not separated from timestamp by whitespace."),a(o),e.endTime=i(),null!=e.endTime)return e.endTime<=e.startTime&&u("End timestamp is not greater than start timestamp."),n.test(r[s])&&!1,a(o),function(e,t){for(var n=e.split(o),a=[],i=0;i<n.length;i++)if(""!=n[i]){var r=n[i].indexOf(":"),s=n[i].slice(0,r);if(value=n[i].slice(r+1),-1!=a.indexOf(s)&&u("Duplicate setting."),a.push(s),""==value)return u("No value for setting defined.");if("vertical"==s){if("rl"!=value&&"lr"!=value){u("Writing direction can only be set to 'rl' or 'rl'.");continue}t.direction=value}else if("line"==s){if(!/\d/.test(value)){u("Line position takes a number or percentage.");continue}if(-1!=value.indexOf("-",1)){u("Line position can only have '-' at the start.");continue}if(-1!=value.indexOf("%")&&value.indexOf("%")!=value.length-1){u("Line position can only have '%' at the end.");continue}if("-"==value[0]&&"%"==value[value.length-1]){u("Line position cannot be a negative percentage.");continue}if("%"==value[value.length-1]){if(100<parseInt(value,10)){u("Line position cannot be >100%.");continue}t.snapToLines=!1}t.linePosition=parseInt(value,10)}else if("position"==s){if("%"!=value[value.length-1]){u("Text position must be a percentage.");continue}if(100<parseInt(value,10)){u("Size cannot be >100%.");continue}t.textPosition=parseInt(value,10)}else if("size"==s){if("%"!=value[value.length-1]){u("Size must be a percentage.");continue}if(100<parseInt(value,10)){u("Size cannot be >100%.");continue}t.size=parseInt(value,10)}else if("align"==s){var l=["start","middle","end","left","right"];if(-1==l.indexOf(value)){u("Alignment can only be set to one of "+l.join(", ")+".");continue}t.alignment=value}else u("Invalid setting.")}}(r.substring(s),e),!0}else u("No valid timestamp separator found.");else u("No valid timestamp separator found.");else u("No valid timestamp separator found.")},this.parseTimestamp=function(){var e=i();if(null==r[s])return e;u("Timestamp must not have trailing characters.")}},WebVTTCueTextParser=function(f,t,c){f=f;var m=0,p=function(e){"metadata"!=c&&t(e,m+1)};function d(){for(var e="data",t="",n="",a=[];null!=f[m-1]||0==m;){var i=f[m];if("data"==e)if("&"==i)n=i,e="escape";else if("<"==i&&""==t)e="tag";else{if("<"==i||null==i)return["text",t];t+=i}else if("escape"==e)if("&"==i)p("Incorrect escape."),t+=n,n=i;else if(/[abglmnsprt]/.test(i))n+=i;else if(";"==i)"&amp"==n?t+="&":"&lt"==n?t+="<":"&gt"==n?t+=">":"&lrm"==n?t+="‎":"&rlm"==n?t+="‏":"&nbsp"==n?t+=" ":(p("Incorrect escape."),t+=n+";"),e="data";else{if("<"==i||null==i)return p("Incorrect escape."),["text",t+=n];p("Incorrect escape."),t+=n+i,e="data"}else if("tag"==e)if("\t"==i||"\n"==i||"\f"==i||" "==i)e="start tag annotation";else if("."==i)e="start tag class";else if("/"==i)e="end tag";else if(/\d/.test(i))t=i,e="timestamp tag";else{if(">"==i||null==i)return">"==i&&m++,["start tag","",[],""];t=i,e="start tag"}else if("start tag"==e)if("\t"==i||"\f"==i||" "==i)e="start tag annotation";else if("\n"==i)n=i,e="start tag annotation";else if("."==i)e="start tag class";else{if(">"==i||null==i)return">"==i&&m++,["start tag",t,[],""];t+=i}else if("start tag class"==e)if("\t"==i||"\f"==i||" "==i)a.push(n),n="",e="start tag annotation";else if("\n"==i)a.push(n),n=i,e="start tag annotation";else if("."==i)a.push(n),n="";else{if(">"==i||null==i)return">"==i&&m++,a.push(n),["start tag",t,a,""];n+=i}else if("start tag annotation"==e){if(">"==i||null==i)return">"==i&&m++,["start tag",t,a,n=n.split(/[\u0020\t\f\r\n]+/).filter(function(e){if(e)return!0}).join(" ")];n+=i}else if("end tag"==e){if(">"==i||null==i)return">"==i&&m++,["end tag",t];t+=i}else if("timestamp tag"==e){if(">"==i||null==i)return">"==i&&m++,["timestamp",t];t+=i}else p("Never happens.");m++}}this.parse=function(e,t){var n={children:[]},a=n,i=[];function r(e){a.children.push({type:"object",name:e[1],classes:e[2],children:[],parent:a}),a=a.children[a.children.length-1]}function s(e){for(var t=a;t;){if(t.name==e)return!0;t=t.parent}}for(;null!=f[m];){var l=d();if("text"==l[0])a.children.push({type:"text",value:l[1],parent:a});else if("start tag"==l[0]){"chapters"==c&&p("Start tags not allowed in chapter title text.");var o=l[1];"v"!=o&&"lang"!=o&&""!=l[3]&&p("Only <v> and <lang> can have an annotation."),"c"==o||"i"==o||"b"==o||"u"==o||"ruby"==o?r(l):"rt"==o&&"ruby"==a.name?r(l):"v"==o?(s("v")&&p("<v> cannot be nested inside itself."),r(l),a.value=l[3],l[3]||p("<v> requires an annotation.")):"lang"==o?(r(l),a.value=l[3]):p("Incorrect start tag.")}else if("end tag"==l[0])"chapters"==c&&p("End tags not allowed in chapter title text."),l[1]==a.name?a=a.parent:"ruby"==l[1]&&"rt"==a.name?a=a.parent.parent:p("Incorrect end tag.");else if("timestamp"==l[0]){"chapters"==c&&p("Timestamp not allowed in chapter title text.");var u=new WebVTTCueTimingsAndSettingsParser(l[1],p).parseTimestamp();null!=u&&((u<=e||t<=u)&&p("Timestamp must be between start timestamp and end timestamp."),0<i.length&&i[i.length-1]>=u&&p("Timestamp must be greater than any previous timestamp."),a.children.push({type:"timestamp",value:u,parent:a}),i.push(u))}}for(;a.parent;)"v"!=a.name&&p("Required end tag missing."),a=a.parent;return n}},WebVTTSerializer=function(){function a(e){return e.startTime+" "+e.endTime+"\n"+function e(t){for(var n="",a=0;a<t.length;a++){var i=t[a];if("text"==i.type)n+=i.value;else if("object"==i.type){if(n+="<"+i.name,i.classes)for(var r=0;r<i.classes.length;r++)n+="."+i.classes[r];i.value&&(n+=" "+i.value),n+=">",i.children&&(n+=e(i.children)),n+="</"+i.name+">"}else n+="<"+i.value+">"}return n}(e.tree.children)+"\n\n"}this.serialize=function(e){for(var t="",n=0;n<e.length;n++)t+=a(e[n]);return t}};