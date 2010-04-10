
if(!this.highlighters){this.highlighters={};}
highlighters['prolog']=[[{'regex':/\b(?:bgidriver|bgifont|check_determ|code|config|diagnostics|error|errorlevel|heap|gstacksize|nobreak|nowarnings|printermenu|project)\b/g,'style':'preproc'},{'next':1,'regex':/%/g,'style':'comment'},{'regex':/\b[+-]?(?:(?:0x[A-Fa-f0-9]+)|(?:(?:[\d]*\.)?[\d]+(?:[eE][+-]?[\d]+)?))u?(?:(?:int(?:8|16|32|64))|L)?\b/g,'style':'number'},{'next':2,'regex':/"/g,'style':'string'},{'next':3,'regex':/'/g,'style':'string'},{'regex':/\b(?:abstract|align|as|and|class|clauses|constants|database|determ|domains|elsedef|endclass|enddef|erroneous|facts|failure|global|goal|if|ifdef|ifndef|implement|include|language|multi|nocopy|nondeterm|object|or|procedure|protected|predicates|reference|single|static|struct|this|ABSTRACT|ALIGN|AS|AND|CLASS|CLAUSES|CONSTANTS|DATABASE|DETERM|DOMAINS|ELSEDEF|ENDCLASS|ENDDEF|ERRONEOUS|FACTS|FAILURE|GLOBAL|GOAL|IF|IFDEF|IFNDEF|IMPLEMENT|INCLUDE|LANGUAGE|MULTI|NOCOPY|NONDETERM|OBJECT|OR|PROCEDURE|PROTECTED|PREDICATES|REFERENCE|SINGLE|STATIC|STRUCT|THIS|assert|asserta|assertz|bound|chain_inserta|chain_insertafter|chain_insertz|chain_terms|consult|db_btrees|db_chains|fail|findall|format|free|msgrecv|msgsend|nl|not|readterm|ref_term|retract|retractall|save|term_bin|term_replace|term_str|trap|write|writef|mod|div|abs|exp|ln|log|sqrt|round|trunc|val|cos|sin|tan|arctan|random|randominit)\b/g,'style':'keyword'},{'next':4,'regex':/\/\*/g,'style':'comment'},{'regex':/\b(?:char|real|string|symbol|byte|sbyte|short|ushort|word|integer|unsigned|dword|long|ulong|binary|ref)\b/g,'style':'type'},{'regex':/~|!|%|\^|\*|\(|\)|-|\+|=|\[|\]|\\|:|;|,|\.|\/|\?|&|<|>|\|/g,'style':'symbol'},{'regex':/\{|\}/g,'style':'cbracket'},{'regex':/(?:[A-Za-z]|_)[A-Za-z0-9_]*[ \t]*(?=\()/g,'style':'function'},{'regex':/[A-Z][A-Za-z0-9_]*|_/g,'style':'variable'}],[{'exit':true,'regex':/$/g}],[{'exit':true,'regex':/$/g},{'regex':/\\(?:\\|")/g},{'exit':true,'regex':/"/g,'style':'string'}],[{'exit':true,'regex':/$/g},{'regex':/\\(?:\\|')/g},{'exit':true,'regex':/'/g,'style':'string'}],[{'exit':true,'regex':/\*\//g,'style':'comment'},{'next':4,'regex':/\/\*/g,'style':'comment'}]];