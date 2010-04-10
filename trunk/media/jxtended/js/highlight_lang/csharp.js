
if(!this.highlighters){this.highlighters={};}
highlighters['csharp']=[[{'regex':/\b(?:using)\b/g,'style':'preproc'},{'regex':/\b[+-]?(?:(?:0x[A-Fa-f0-9]+)|(?:(?:[\d]*\.)?[\d]+(?:[eE][+-]?[\d]+)?))(?:[FfDdMmUulL]+)?\b/g,'style':'number'},{'next':1,'regex':/\/\/\//g,'style':'comment'},{'next':7,'regex':/\/\//g,'style':'comment'},{'next':8,'regex':/\/\*\*/g,'style':'comment'},{'next':14,'regex':/\/\*/g,'style':'comment'},{'next':15,'regex':/^[ \t]*#(?:[ \t]*include)/g,'state':1,'style':'preproc'},{'regex':/^[ \t]*#(?:[ \t]*[A-Za-z0-9_]*)/g,'style':'preproc'},{'regex':/\b[+-]?(?:(?:0x[A-Fa-f0-9]+)|(?:(?:[\d]*\.)?[\d]+(?:[eE][+-]?[\d]+)?))u?(?:(?:int(?:8|16|32|64))|L)?\b/g,'style':'number'},{'next':32,'regex':/"/g,'style':'string'},{'next':33,'regex':/'/g,'style':'string'},{'regex':/(\b(?:class|struct|typename))([ \t]+)([A-Za-z0-9]+)/g,'style':['keyword','normal','type']},{'regex':/\b(?:abstract|event|new|struct |as|explicit|null|switch|base|extern|this|false|operator|throw|break|finally|out|true|fixed|override|try|case|params|typeof|catch|for|private|foreach|protected|checked|goto|public|unchecked|class|if|readonly|unsafe|const|implicit|ref|continue|in|return|virtual|default|interface|sealed|volatile|delegate|internal|do|is|sizeof|while|lock|stackalloc|else|static|enum|namespace|get|partial|set|value|where|yield)\b/g,'style':'keyword'},{'regex':/\b(?:bool|byte|sbyte|char|decimal|double|float|int|uint|long|ulong|object|short|ushort|string|void)\b/g,'style':'type'},{'regex':/~|!|%|\^|\*|\(|\)|-|\+|=|\[|\]|\\|:|;|,|\.|\/|\?|&|<|>|\|/g,'style':'symbol'},{'regex':/\{|\}/g,'style':'cbracket'},{'regex':/(?:[A-Za-z]|_)[A-Za-z0-9_]*[ \t]*(?=\()/g,'style':'function'}],[{'exit':true,'regex':/$/g},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'next':2,'regex':/<!DOCTYPE/g,'state':1,'style':'preproc'},{'next':4,'regex':/<!--/g,'style':'comment'},{'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*(?:\/)?>/g,'style':'keyword'},{'next':5,'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*/g,'state':1,'style':'keyword'},{'regex':/&(?:[A-Za-z0-9]+);/g,'style':'preproc'},{'regex':/@[A-Za-z]+/g,'style':'type'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/>/g,'style':'preproc'},{'next':3,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/-->/g,'style':'comment'},{'next':4,'regex':/<!--/g,'style':'comment'}],[{'exit':true,'regex':/(?:\/)?>/g,'style':'keyword'},{'regex':/[^=" \t>]+/g,'style':'type'},{'regex':/=/g,'style':'symbol'},{'next':6,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/$/g}],[{'exit':true,'regex':/\*\//g,'style':'comment'},{'next':8,'regex':/\/\*\*/g,'style':'comment'},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'next':9,'regex':/<!DOCTYPE/g,'state':1,'style':'preproc'},{'next':11,'regex':/<!--/g,'style':'comment'},{'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*(?:\/)?>/g,'style':'keyword'},{'next':12,'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*/g,'state':1,'style':'keyword'},{'regex':/&(?:[A-Za-z0-9]+);/g,'style':'preproc'},{'regex':/@[A-Za-z]+/g,'style':'type'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/>/g,'style':'preproc'},{'next':10,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/-->/g,'style':'comment'},{'next':11,'regex':/<!--/g,'style':'comment'}],[{'exit':true,'regex':/(?:\/)?>/g,'style':'keyword'},{'regex':/[^=" \t>]+/g,'style':'type'},{'regex':/=/g,'style':'symbol'},{'next':13,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/\*\//g,'style':'comment'},{'next':14,'regex':/\/\*/g,'style':'comment'},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/$/g},{'next':16,'regex':/</g,'style':'string'},{'next':17,'regex':/"/g,'style':'string'},{'next':18,'regex':/\/\/\//g,'style':'comment'},{'next':24,'regex':/\/\//g,'style':'comment'},{'next':25,'regex':/\/\*\*/g,'style':'comment'},{'next':31,'regex':/\/\*/g,'style':'comment'}],[{'exit':true,'regex':/$/g},{'exit':true,'regex':/>/g,'style':'string'}],[{'exit':true,'regex':/$/g},{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/$/g},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'next':19,'regex':/<!DOCTYPE/g,'state':1,'style':'preproc'},{'next':21,'regex':/<!--/g,'style':'comment'},{'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*(?:\/)?>/g,'style':'keyword'},{'next':22,'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*/g,'state':1,'style':'keyword'},{'regex':/&(?:[A-Za-z0-9]+);/g,'style':'preproc'},{'regex':/@[A-Za-z]+/g,'style':'type'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/>/g,'style':'preproc'},{'next':20,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/-->/g,'style':'comment'},{'next':21,'regex':/<!--/g,'style':'comment'}],[{'exit':true,'regex':/(?:\/)?>/g,'style':'keyword'},{'regex':/[^=" \t>]+/g,'style':'type'},{'regex':/=/g,'style':'symbol'},{'next':23,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/$/g}],[{'exit':true,'regex':/\*\//g,'style':'comment'},{'next':25,'regex':/\/\*\*/g,'style':'comment'},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'next':26,'regex':/<!DOCTYPE/g,'state':1,'style':'preproc'},{'next':28,'regex':/<!--/g,'style':'comment'},{'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*(?:\/)?>/g,'style':'keyword'},{'next':29,'regex':/<(?:\/)?[A-Za-z][A-Za-z0-9]*/g,'state':1,'style':'keyword'},{'regex':/&(?:[A-Za-z0-9]+);/g,'style':'preproc'},{'regex':/@[A-Za-z]+/g,'style':'type'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/>/g,'style':'preproc'},{'next':27,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/-->/g,'style':'comment'},{'next':28,'regex':/<!--/g,'style':'comment'}],[{'exit':true,'regex':/(?:\/)?>/g,'style':'keyword'},{'regex':/[^=" \t>]+/g,'style':'type'},{'regex':/=/g,'style':'symbol'},{'next':30,'regex':/"/g,'style':'string'}],[{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/\*\//g,'style':'comment'},{'next':31,'regex':/\/\*/g,'style':'comment'},{'regex':/(?:<?)[A-Za-z0-9_\.\/\-_]+@[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:<?)[A-Za-z0-9_]+:\/\/[A-Za-z0-9_\.\/\-_]+(?:>?)/g,'style':'url'},{'regex':/(?:TODO|FIXME)(?:[:]?)/g,'style':'todo'}],[{'exit':true,'regex':/"/g,'style':'string'},{'regex':/\\./g,'style':'specialchar'}],[{'exit':true,'regex':/'/g,'style':'string'},{'regex':/\\./g,'style':'specialchar'}]];