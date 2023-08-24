import xlsx from "xlsx";
import feather from "feather-icons";
import Tabulator from "tabulator-tables";

(function (cash) {
    "use strict";

    if (cash("#terminalListe").length) {
        // Setup Tabulator
        let table = new Tabulator("#terminalListe", {
            printAsHtml: true,
            printStyled: true,
            pagination:"local",
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 30, 40],
            layout: "fitColumns",
            responsiveLayout: "collapse",   
            placeholder: "No matching records found",
            columns: [
                {title:"Terminal",field:"Name"},
                {title:"Operateur carte",field:"OperateurCarte",print: true,download: true},
                {title:"Numéro serie",field:"NumeroSerie",print: true,download: true},
                {title:"Marchand",field:"Name",print: true,download: true},
                {title:"Part Name",field:"PartName",print: true,download: true},
                {title:"modele",field:"Name",print: true,download: true},
                {title:"Cree le",field:"created_at",print: true,download: true},
                
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
                }
               
            ],
            renderComplete() {
                feather.replace({
                    "stroke-width": 1.5,
                });
            },
        });
        axios.get('api/terminalsTab')
        .then(response => response)
        .then(modeleElement => {
            console.log('Success terminal :', modeleElement);
            table.setData(modeleElement.data);
        })
        .catch((error) => {
            console.error('Error term:', error);
        });
        //console.log("term :"+operations);
        
        // Redraw table onresize
        window.addEventListener("resize", () => {
            table.redraw();
            feather.replace({
                "stroke-width": 1.5,
            });
        });
           // Export
        cash("#tabulator-export-csv").on("click", function (event) {
            table.download("csv", "data.csv");
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

         // Redraw table onresize
            window.addEventListener("resize", () => {
            table.redraw();
            feather.replace({
                "stroke-width": 1.5,
            });
        });
    }

 })(cash);