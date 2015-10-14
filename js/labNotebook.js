// Call appropriate function based on user input
function runFunction(name) {
    var fn = window[name];
    if (typeof fn !== 'function') {
        return;
    }
    
    fn.apply(window);
}

// Update page content
function updateDiv(id, content) {
    document.getElementById(id).innerHTML = content;
}

// Empty modified forms
function cleanup() {
    $('#inputs').empty();
}

// Add fields to MA104 split
function addFlask() {
    var content =
        "<label for=\"flask\">Flask size: </label>\
        <select name=\"flask\" onchange=\"splitContent()\">\
        <option selected=\"selected\" disabled=\"disabled\">Select a flask size</option>\
        <option value=\"T25\">T25</option>\
        <option value=\"T50\">T50</option>\
        <option value=\"T75\">T75</option>\
        <option value=\"T150\">T150</option>\
        <option value=\"T175\">T175</option>\
        </select><br />\n\
        <label for=\"cell\">Volume cell mix added: </label>\
        <input type=\"text\" name=\"cell\" onchange=\"splitContent()\"><br />\n\
        <label for=\"medium\">Volume medium added: </label>\
        <input type=\"text\" name=\"medium\" onchange=\"splitContent()\"><br /><br />";
    $("#inputs").append(content);
}

////////////////////////
//
// Add content to page
//
////////////////////////

// Preparation of incomplete M199
function incompleteMedium() {
    var content =
        "\\item Prepared serum-free Medium 199 \n\
    \\begin{enumerate} \n\
        \\item Supplemented $500$mL incomplete Medium 199 (incomplete M199) with $5$mL \n\
        penicillin/streptomycin stock ($100$U/mL penicillin; $100\\mu$g/mL streptomycin \n\
        final concentration) and $1$mL $250\\mu$g/mL amphotericin B stock ($0.25\\mu$g/mL \n\
        amphotericin B final concentration) \n\
        \\item Stored at $4^{\\circ}$C \n\
    \\end{enumerate}";
    
    cleanup();
    updateDiv("output", content);
}

// Preparation of complete M199
function completeMedium() {
    var content =
        "\\item Prepared serum-free Medium 199 \n\
    \\begin{enumerate} \n\
        \\item Supplemented $500$mL incomplete Medium 199 (incomplete M199) with $5$mL \n\
        penicillin/streptomycin stock ($100$U/mL penicillin; $100\\mu$g/mL streptomycin \n\
        final concentration) and $1$mL $250\\mu$g/mL amphotericin B stock ($0.25\\mu$g/mL \n\
        amphotericin B final concentration), $55$mL fetal bovine serum \n\
        \\item Stored at $4^{\\circ}$C \n\
    \\end{enumerate}";
    
    cleanup();
    updateDiv("output", content);
}

// Preparation of 1.2% agarose
function agarose() {
    var content =
        "<label for=\"mass\">Mass agarose weighed:</label><br /><input type=\"text\" name=\"mass\" onchange=\"agaroseContent()\">";
    
    cleanup();
    updateDiv("inputs", content);
}

function agaroseContent() {
    var fields = $( "#inputs" ).serializeArray();
    var content =
        "\\item Prepared $400$mL $1.2$\% agarose \n\
    \\begin{enumerate} \n\
        \\item Combined $" + fields[0].value + "$g SeaPlaque agar to $\sim 400$mL milli-Q-filtered water \n\
        \\item Autoclaved for $20$ minutes \n\
        \\item Stored at room temperature \n\
    \\end{enumerate}";
        
    document.getElementById('output').innerHTML = content;
}

// Preparation of 2x EMEM
function emem() {
    var content =
        "\\item Prepared 2$\\times$ EMEM, serum-free\n\
    \\begin{enumerate}\n\
        \\item Supplemented $500$mL 2$times$ EMEM stock with $10$mL $200$mM L-glutamine stock \n\
        ($4$mM L-glutamine final concentration), $10$mL penicillin/streptomycin stock \n\
        ($200$U/mL penicillin; $200\\mu$g/mL streptomycin final concentration), and $1$mL $250\\mu$g/mL \n\
        amphotericin B stock ($0.5\\mu$g/mL amphotericin B final concentration)\n\
        \\item Stored at $4^{\\circ}$C\n\
    \\end{enumerate}";
    
    cleanup();
    updateDiv("output", content);
}

// Preparation of 1x PBS
function pbs() {
    var content =
        "\\item Prepared 1$\\times$ PBS\n\
    \\begin{enumerate}\n\
        \\item Combined $80$mL 10$\\times$ PBS and $720$mL milli-Q-filtered water in a $1$L graduated cylinder\n\
        \\item Transferred to a $1$L bottle\n\
        \\item Autoclaved for 30 minutes\n\
        \\item Stored at room temperature\n\
    \\end{enumerate}";
    
    cleanup();
    updateDiv("output", content);
}

function split() {
    var content =
        "<label for=\"passage\">Split from passage #: </label>\
        <input type=\"text\" name=\"passage\" onchange=\"splitContent()\"><br />\n\
        <label for=\"flask\">Split from flask: </label>\
        <input type=\"text\" name=\"flask\" onchange=\"splitContent()\"><br />\
        <label for=\"pbs\">Volume PBS used (mL): </label>\
        <input type=\"text\" name=\"pbs\" onchange=\"splitContent()\"><br />\n\
        <label for=\"trypsin\">Volume trypsin used/wash (mL): </label>\
        <input type=\"text\" name=\"trypsin\" onchange=\"splitContent()\"><br />\
        <label for=\"medium\">Volume M199 added to trypsin (mL): </label>\
        <input type=\"text\" name=\"medium\" onchange=\"splitContent()\"><br /><br />\n\
        <label for=\"flask\">Flask size: </label>\
        <select name=\"flask\" \">\
        <option selected=\"selected\" disabled=\"disabled\" onchange=\"splitContent()\">Select a flask size</option>\
        <option value=\"T25\">T25</option>\
        <option value=\"T50\">T50</option>\
        <option value=\"T75\">T75</option>\
        <option value=\"T150\">T150</option>\
        <option value=\"T175\">T175</option>\
        </select><br />\n\
        <label for=\"cell\">Volume cell mix added: </label>\
        <input type=\"text\" name=\"cell\" \"><br />\n\
        <label for=\"medium\">Volume medium added: </label>\
        <input type=\"text\" name=\"medium\" onchange=\"splitContent()\"><br /><br />";
    
    cleanup();
    updateDiv("inputs", content);
    
    $('#selector').append("<span id=\"repeat\" onclick=\"addFlask()\">Add another flask</span>");
}

function splitContent() {
    var fields = $( "#inputs" ).serializeArray();
    var newPassage = Number(fields[0].value) + 1;
    var content = "";
    
    if (fields[1].name == "flask" && fields[1].value != "") {
        content +=
            "\\item MA104 cell split --- Passage " + newPassage + ", from Passage " + fields[0].value + ", Flask " + fields[1].value + "\n\
    \\begin{enumerate}\n\
        \\item Aspirated cell culture medium\n";
    }
    
    if (fields[2].name == "pbs" && fields[2].value != "") {
        content +=
            "        \\item Rinsed cells in $" + fields[2].value + "$mL 1x PBS; aspirated PBS\n";
    }
    
    if (fields[3].name == "trypsin" && fields[3].value != "") {
        content +=
            "        \\item Rinsed cells in $" + fields[3].value + "$mL $0.05$\\% trypsin; aspirated trypsin\n\
        \\item Bathed cells in $" + fields[3].value + "$mL $0.05$\\% trypsin\n\
        \\item Incubated cells at $37^{\\circ}$C until all cells detached from flask\n";
    }
    
    if (fields[4].name == "medium" && fields[4].value != "") {
        content +=
            "        \\item Added $" + fields[4].value + "$mL complete M199 to flask\n";
    }
    
    var i = 5;
    var j = 0;
    var char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    if ((fields.length + 1) % 3 == 0 && fields.length > 5) {
        while(i < fields.length) {
            content +=
                "        \\item Added to a " + fields[i].value + " flask (Flask P"+ newPassage + char[j] +") $";
            i++;
            j++;
        
            content += fields[i].value + "$mL cell mix and $";
            i++;
            content += fields[i].value + "$mL complete M199\n";
            i++;
        }
    }
    
    if (fields.length >= 7 && fields[7].value != "") {
        content += "        \\item Gently shook flasks to distribute cells evenly\n\
        \\item Incubated at $37^{\\circ}$C\n\
    \\end{enumerate}";
    }
    
    document.getElementById('output').innerHTML = content;
}

function plate() {}

function infect() {}

function plaque() {}

function transduction() {}