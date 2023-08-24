import xlsx from "xlsx";
import feather from "feather-icons";
import Tabulator from "tabulator-tables";

(function (cash) {
    "use strict";

    if (cash("#listeOperation").length) {
                    // Setup Tabulator
        let table = new Tabulator("#listeOperation", {
            ajaxURL: "http://127.0.0.1:8000/api/operationsTab",
            ajaxFiltering: true,
            ajaxSorting: true,
            printAsHtml: true,
            printStyled: true,
            pagination: "remote",
            paginationSize: 10,
            paginationSizeSelector: [10, 20, 30, 40],
            layout: "fitColumns",
            responsiveLayout: "collapse",   
            placeholder: "No matching records found",
            columns: [
                {title:"Technicien",field:"technicien",print: true,download: true},
                {title:"Terminal",field:"term",print: true,download: true},
                {title:"Modele",field:"mod",print: true,download: true},
                {title:"Marchand",field:"march",print: true,download: true},
                {title:"fabriquant",field:"fabr",print: true,download: true},
                {title:"date",field:"date",print: true,download: true},
                {title:"Créé le",field:"createAt",print: true,download: true},
                
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
         // Redraw table onresize
         window.addEventListener("resize", () => {
            table.redraw();
            feather.replace({
                "stroke-width": 1.5,
            });
        });
    }
})(cash);