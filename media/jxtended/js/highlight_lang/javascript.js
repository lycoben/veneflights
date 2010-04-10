
if(!this.highlighters){this.highlighters={};}
highlighters['javascript']=[[{'regex':/\b(?:import|package)\b/g,'style':'preproc'},{'next':1,'regex':/\/\/\//g,'style':'comment'},{'next':7,'regex':/\/\//g,'style':'comment'},{'next':8,'regex':/\/\*\*/g,'style':'comment'},{'next':14,'regex':/\/\*/g,'style':'comment'},{'regex':/\b[+-]?(?:(?:0x[A-Fa-f0-9]+)|(?:(?:[\d]*\.)?[\d]+(?:[eE][+-]?[\d]+)?))u?(?:(?:int(?:8|16|32|64))|L)?\b/g,'style':'number'},{'next':15,'regex':/"/g,'style':'string'},{'next':16,'regex':/'/g,'style':'string'},{'regex':/(\b(?:class|interface))([ \t]+)([$A-Za-z0-9]+)/g,'style':['keyword','normal','type']},{'regex':/\b(?:abstract|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|false|final|finally|for|function|goto|if|implements|in|instanceof|interface|native|new|null|private|protected|prototype|public|return|static|super|switch|synchronized|throw|throws|this|transient|true|try|typeof|var|volatile|while|with)\b/g,'style':'keyword'},{'regex':/\b(?:int|byte|boolean|char|long|float|double|short|void)\b/g,'style':'type'},{'regex':/~|!|%|\^|\*|\(|\)|-|\+|=|\[|\]|\\|:|;|,|\.|\/|\?|&|<|>|\|/g,'style':'symbol'},{'regex':/\{|\}/g,'style':'cbracket'},{'regex':/(?:[A-Za-z]|_)[A-Za-z0-9_]*[ \t]*(?=\()/g,'style':'function'}],[{'exit':true,'regex':/$/g},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'next':2,'regex':/<!DOCTYPE/g,'state':1,'style':'preproc'},{'next':4,'regex':/<!--/g,'style':'comment'},{'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*(?:\/)?>/g,'style':'keyword'},{'next':5,'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*/g,'state':1,'style':'keyword'},{'regex':/&(?:[A-Za-z0-9]+);/g,'style':'preproc'},{'regex':/@[A-Za-z]+/g,'style':'type'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/>/g,'style':'preproc'},{'next':3,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/-->/g,'style':'comment'},{'next':4,'regex':/<!--/g,'style':'comment'}],[{'exit':true,'regex':/(?:\/)?>/g,'style':'keyword'},{'regex':/[^=" \t>]+/g,'style':'type'},{'regex':/=/g,'style':'symbol'},{'next':6,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/$/g}],[{'exit':true,'regex':/\*\//g,'style':'comment'},{'next':8,'regex':/\/\*\*/g,'style':'comment'},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'next':9,'regex':/<!DOCTYPE/g,'state':1,'style':'preproc'},{'next':11,'regex':/<!--/g,'style':'comment'},{'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*(?:\/)?>/g,'style':'keyword'},{'next':12,'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*/g,'state':1,'style':'keyword'},{'regex':/&(?:[A-Za-z0-9]+);/g,'style':'preproc'},{'regex':/@[A-Za-z]+/g,'style':'type'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/>/g,'style':'preproc'},{'next':10,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/-->/g,'style':'comment'},{'next':11,'regex':/<!--/g,'style':'comment'}],[{'exit':true,'regex':/(?:\/)?>/g,'style':'keyword'},{'regex':/[^=" \t>]+/g,'style':'type'},{'regex':/=/g,'style':'symbol'},{'next':13,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/\*\//g,'style':'comment'},{'next':14,'regex':/\/\*/g,'style':'comment'},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/"/g,'style':'string'},{'regex':/\\./g,'style':'specialchar'}],[{'exit':true,'regex':/'/g,'style':'string'},{'regex':/\\./g,'style':'specialchar'}]];