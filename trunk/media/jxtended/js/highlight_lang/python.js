
if(!this.highlighters){this.highlighters={};}
highlighters['python']=[[{'regex':/\b(?:import|from)\b/g,'style':'preproc'},{'next':1,'regex':/#/g,'style':'comment'},{'regex':/\b[+-]?(?:(?:0x[A-Fa-f0-9]+)|(?:(?:[\d]*\.)?[\d]+(?:[eE][+-]?[\d]+)?))u?(?:(?:int(?:8|16|32|64))|L)?\b/g,'style':'number'},{'regex':/\b(?:and|assert|break|class|continue|def|del|elif|else|except|exec|finally|for|global|if|in|is|lambda|not|or|pass|print|raise|return|try|while)\b/g,'style':'keyword'},{'next':2,'regex':/\/\*/g,'style':'comment'},{'next':3,'regex':/^(?:[\s]*'{3})/g,'style':'comment'},{'next':4,'regex':/^(?:[\s]*\"{3})/g,'style':'comment'},{'regex':/^(?:[\s]*'(?:[^\\']|\\.)*'[\s]*|[\s]*\"(?:[^\\\"]|\\.)*\"[\s]*)$/g,'style':'comment'},{'next':5,'regex':/"/g,'style':'string'},{'next':6,'regex':/'/g,'style':'string'},{'next':7,'regex':/(?:[\s]*'{3})/g,'style':'string'},{'next':8,'regex':/(?:[\s]*\"{3})/g,'style':'string'},{'regex':/~|!|%|\^|\*|\(|\)|-|\+|=|\[|\]|\\|:|;|,|\.|\/|\?|&|<|>|\|/g,'style':'symbol'},{'regex':/\{|\}/g,'style':'symbol'},{'regex':/(?:[A-Za-z]|_)[A-Za-z0-9_]*[ \t]*(?=\()/g,'style':'function'},{'regex':/[A-Za-z_][A-Za-z0-9_]*/g,'style':'variable'}],[{'exit':true,'regex':/$/g}],[{'exit':true,'regex':/\*\//g,'style':'comment'},{'next':2,'regex':/\/\*/g,'style':'comment'}],[{'exit':true,'regex':/(?:'{3})/g,'style':'comment'}],[{'exit':true,'regex':/(?:\"{3})/g,'style':'comment'}],[{'exit':true,'regex':/$/g},{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/$/g},{'regex':/\\(?:\\|')/g},{'exit':true,'regex':/'/g,'style':'string'}],[{'exit':true,'regex':/(?:'{3})/g,'style':'string'}],[{'exit':true,'regex':/(?:\"{3})/g,'style':'string'}]];