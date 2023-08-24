import xlsx from "xlsx";
import feather from "feather-icons";
import Tabulator from "tabulator-tables";

(function (cash) {
    "use strict";

    if (cash("#interventionListe").length) {
        // Setup Tabulator
        let table = new Tabulator("#interventionListe", {
            ajaxURL: "api/typerequeteTab",
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
            columns:[
                {title:"Intervention",field:"Name",print: true,download: true},
                {title:"Description",field:"Description",print: true,download: true},
                {title:"cree le",field:"created_at",print: true,download: true},
            ],
            renderComplete() {
                feather.replace({
                    "stroke-width": 1.5,
                });
            },
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