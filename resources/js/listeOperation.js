import xlsx from "xlsx";
import feather from "feather-icons";
import Tabulator from "tabulator-tables";

(function (cash) {
    "use strict";

    // Tabulator
    if (cash("#listeOperation").length) {
        // Setup Tabulator
        var operations;
 
        let table = new Tabulator("#listeOperation", {
            printAsHtml: true,
            printStyled: true,
            pagination: "remote",
            paginationSize: 10,
            printHeader:"<h1>Tableau des operations</h1>",
            paginationSizeSelector: [10, 20, 30, 40],
            layout: "fitColumns",
            responsiveLayout: "collapse",
            placeholder: "No matching records found",
            columns: [
                {
                    formatter: "responsiveCollapse",
                    width: 40,
                    minWidth: 30,
                    align: "center",
                    resizable: false,
                    headerSort: false,
                },

                // For HTML table
                {
                    title: "Technicien",
                    field: "technicien",
                    vertAlign: "middle",
                    print: true,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium whitespace-nowrap">${
                                cell.getData().Technicien
                            }</div>

                        </div>`;
                    },
                },
                {
                    title: "Terminal",
                    field: "term",
                    vertAlign: "middle",
                    print: true,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium whitespace-nowrap">${
                                cell.getData().terminal
                            }</div>
                           
                        </div>`;
                    },
                },
                {
                    title: "Modele",
                    field: "mod",
                    vertAlign: "middle",
                    print: true,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium whitespace-nowrap">${
                                cell.getData().modele
                            }</div>
                          
                        </div>`;
                    },
                }, {
                    title: "Marchand",
                    field: "march",
                    vertAlign: "middle",
                    print: true,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium whitespace-nowrap">${
                                cell.getData().marchand
                            }</div>
                           
                        </div>`;
                    },
                },
                {
                    title: "fabriquant",
                    field: "fabr",
                    vertAlign: "middle",
                    print: true,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium whitespace-nowrap">${
                                cell.getData().fabriquant
                            }</div>
                           
                        </div>`;
                    },
                },
                {
                    title: "date",
                    field: "date",
                    vertAlign: "middle",
                    print: true,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium whitespace-nowrap">${
                                cell.getData().date
                            }</div>
                        </div>`;
                    },
                },
                {
                    title: "Cree le",
                    field: "createAt",
                    vertAlign: "middle",
                    print: true,
                    download: true,
                    formatter(cell, formatterParams) {
                        return `<div>
                            <div class="font-medium whitespace-nowrap">${
                                cell.getData().created_at
                            }</div>
                            
                        </div>`;
                    },
                },

                {
                    title: "ACTIONS",
                    field: "actions",
                    responsive: 1,
                    hozAlign: "center",
                    vertAlign: "middle",
                    print: false,
                    download: false,
                    formatter(cell, formatterParams) {
                        let a = cash(`<div class="flex lg:justify-center items-center">
                            <a class="edit flex items-center mr-3" href="javascript:;">
                                <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                            </a>
                            <a class="delete flex items-center text-theme-6" href="javascript:;">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>
                        </div>`);
                        cash(a)
                            .find(".edit")
                            .on("click", function () {
                                alert("EDIT");
                            });

                        cash(a)
                            .find(".delete")
                            .on("click", function () {
                                alert("DELETE");
                            });

                        return a[0];
                    },
                },

                // For print format
                {
                    title: "Technicien",
                    field: "technicien",
                    visible: false,
                    print: true,
                    download: true,
                },
                {
                    title: "Terminal",
                    field: "term",
                    visible: false,
                    print: true,
                    download: true,
                },
                ,
                {
                    title: "Modele",
                    field: "mod",
                    visible: false,
                    print: true,
                    download: true,
                },
                ,
                {
                    title: "Marchand",
                    field: "march",
                    visible: false,
                    print: true,
                    download: true,
                },
                ,
                {
                    title: "Date",
                    field: "date",
                    visible: false,
                    print: true,
                    download: true,
                },
                ,
                {
                    title: "Créé le",
                    field: "createAt",
                    visible: false,
                    print: true,
                    download: true,
                }
            ],
            renderComplete() {
                feather.replace({
                    "stroke-width": 1.5,
                });
            },
        });
        axios.get('api/operations')
        .then(response => response)
        .then(modeleElement => {
            console.log('Success modele by fabriquant:', modeleElement);
            table.setData(modeleElement.data);
        })
        .catch((error) => {
            console.error('Error modeleElement:', error);
        });
        console.log("oper :"+operations);
        
        // Redraw table onresize
        window.addEventListener("resize", () => {
            table.redraw();
            feather.replace({
                "stroke-width": 1.5,
            });
        });

        // Filter function
        function filterHTMLForm() {
            let field = cash("#tabulator-html-filter-field").val();
            let type = cash("#tabulator-html-filter-type").val();
            let value = cash("#tabulator-html-filter-value").val();
            table.setFilter(field, type, value);
        }

/*         // On submit dynamic filter form
        cash("#tabulator-html-filter-form")[0].addEventListener(
            "keypress",
            function (event) {
                let keycode = event.keyCode ? event.keyCode : event.which;
                if (keycode == "13") {
                    event.preventDefault();
                    filterHTMLForm();
                }
            }
        );

        // On click go button
        cash("#tabulator-html-filter-go").on("click", function (event) {
            //filterHTMLForm();
            filterOperationForm();

        });  */
        
        // On click search button
        cash("#searchButton").on("click", function (event) {
            filterOperationForm();
        });

        function dateFilter(data, filterParams){
            let date1 = new Date(filterParams.dateFrom);
            let date2= new Date(filterParams.dateTo);
            let dateFromTable = new Date(data.created_at);
            let terminal = filterParams.terminal;
            let marchand = filterParams.marchand;
            let technicien = filterParams.technicien;
            let modele = filterParams.modele;
            let fabriquant = filterParams.fabriquant;
            let ret = new Boolean(true) ;
            if(date1 != "" && date2 != ""){
               ret &= (date1.getTime() < dateFromTable.getTime() && dateFromTable.getTime() <= date2.getTime())?true:false;
            }
            /* {

                console.log(dateFromTable.getTime());
                console.log(date1.getTime());
                console.log(date2.getTime());
                console.log("success");
                return true;
            }else
            {

                console.log(dateFromTable.getTime());
                console.log("Error");
                return false;
            } */
            if(terminal != "" ){
                ret &=(terminal == data.terminal)?true:false;
                // variable +='{"term","=","'+terminal+'"};';
                //arrayFilter.push(JSON.parse('{"field":"terminal","type":"like","value":"'+terminal+'"}'))
 
             }
             if(marchand != "" ){
                ret &=(marchand == data.marchand )?true:false;
                 //variable +='{"march","=","'+marchand+'"};';
                 //arrayFilter.push(JSON.parse('{"field":"marchand","type":"like","value":"'+marchand+'"}'));
 
 
             }if(technicien != ""  ){
                ret &=(technicien == data.technicien)?true:false;
                 //variable +='{field:"technicien",type:"=",value:"'+technicien+'"};';
                 //arrayFilter.push(JSON.parse('{"field":"technicien","type":"like","value":"'+technicien+'"}'));
 
             }if(modele != "" ){
                ret &=(modele==data.modele)?true:false;
                 //variable +='{field:"mod",type:"=",value:"'+modele+'"};';
                 //arrayFilter.push(JSON.parse('{"field":"modele","type":"like","value":"'+modele+'"}'));
                 //table.setFilter("modele","like",modele);
 
 
             }if(fabriquant != "" ){
                ret &=(fabriquant == data.fabriquant)?true:false;
                 //variable +='{"fabr","=","'+fabriquant+'"};';
                 // arrayFilter.push(JSON.parse('{"field":"fabriquant","type":"like","value":"'+fabriquant+'"}'));
                 //table.setFilter({"fabr","=",fabriquant});
                 //console.log("fabr","like",fabriquant);
                 //table.setFilter("fabriquant","like",fabriquant);
 
             }
             return ret ;

        }
        
        function filterOperationForm(){
            let dateFromInput = cash("#date1").val();
            let dateToInput = cash("#date2").val();
            let terminal = cash("#terminalId").val();
            let marchand = cash("#MarchandId").val();
            let technicien = cash("#technicienId").val();
            let modele = cash("#ModeleId").val();
            let fabriquant = cash("#fabriquantId").val();
            let variable="";
            var arrayFilter= new Array();
           

/*             if(terminal != "" ){
               // variable +='{"term","=","'+terminal+'"};';
               arrayFilter.push(JSON.parse('{"field":"terminal","type":"like","value":"'+terminal+'"}'))

            }
            if(marchand != "" ){
                //variable +='{"march","=","'+marchand+'"};';
                arrayFilter.push(JSON.parse('{"field":"marchand","type":"like","value":"'+marchand+'"}'));


            }if(technicien != ""  ){
                //variable +='{field:"technicien",type:"=",value:"'+technicien+'"};';
                arrayFilter.push(JSON.parse('{"field":"technicien","type":"like","value":"'+technicien+'"}'));

            }if(modele != "" ){
                //variable +='{field:"mod",type:"=",value:"'+modele+'"};';
                arrayFilter.push(JSON.parse('{"field":"modele","type":"like","value":"'+modele+'"}'));
                //table.setFilter("modele","like",modele);


            }if(fabriquant != "" ){
                //variable +='{"fabr","=","'+fabriquant+'"};';
                 arrayFilter.push(JSON.parse('{"field":"fabriquant","type":"like","value":"'+fabriquant+'"}'));
                //table.setFilter({"fabr","=",fabriquant});
                //console.log("fabr","like",fabriquant);
                //table.setFilter("fabriquant","like",fabriquant);

            }
            if(dateFromInput !="" & dateToInput !="")
            {  
                 
               //  arrayFilter.push(JSON.parse('{"dateFilter",{"dateFrom":"'+dateFromInput+'","dateTo":"'+dateToInput+'"}}'));
                //arrayFilter.push(JSON.parse('{"dateFilter",{"dateFrom":"'+dateFromInput+'","dateTo":"'+dateToInput+'"}}'));
                table.setFilter(dateFilter,{dateFrom:dateFromInput,dateTo:dateToInput});

            //  variable +="{}";

            } */
            //variable += "";
            //var arrayFilter = variable.substr(0,variable.length-1).split(";");
           table.setFilter(dateFilter,{
               dateFrom:dateFromInput,
               dateTo:dateToInput,
               terminal:terminal,
               technicien :technicien,
               modele :modele,
               fabriquant :fabriquant,
               marchand :marchand
            });
           console.log(table.getFilters());
            //console.log(arrayFilter);
           // var obj = JSON.parse(variable);
           //table.setFilter(arrayFilter);

        }

        // On reset filter form
        cash("#tabulator-html-filter-reset").on("click", function (event) {
            cash("#tabulator-html-filter-field").val("name");
            cash("#tabulator-html-filter-type").val("like");
            cash("#tabulator-html-filter-value").val("");
            table.clearFilters();
            //filterHTMLForm();
        });

        // Export
        cash("#tabulator-export-csv").on("click", function (event) {
            table.download("csv", "data.csv");
        });
        cash("#tabulator-export-pdf").on("click", function (event) {
            table.download("pdf", "data.pdf");
        });
        cash("#tabulator-export-json").on("click", function (event) {
            table.download("json", "data.json");
        });

        cash("#tabulator-export-xlsx").on("click", function (event) {
            window.XLSX = xlsx;
            table.download("xlsx", "data.xlsx", {
                sheetName: "Products",
            });
        });

        cash("#tabulator-export-html").on("click", function (event) {
            table.download("html", "data.html", {
                style: true,
            });
        });

        // Print
        cash("#tabulator-print").on("click", function (event) {
            table.print();
        });
    }
})(cash);
