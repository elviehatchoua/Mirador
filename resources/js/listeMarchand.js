import xlsx from "xlsx";
import feather from "feather-icons";
import Tabulator from "tabulator-tables";

(function (cash) {
    "use strict";

    if (cash("#listeMarchand").length) {
        // Setup Tabulator
        let table = new Tabulator("#listeMarchand", {
            printAsHtml: true,
            printStyled: true,
            pagination: "local",
            paginationSize: 10,
            paginationSizeSelector: [10,25, 50, 75, 100],
            layout: "fitColumns",
            responsiveLayout: "collapse",
            placeholder: "No matching records found",
            columns:[
                {title:"Marchand",field:"Name",print: true,download: true},
                {title:"id",field:"id",print: false,download:false, visible: false},
                {title:"Localisation",field:"Location",print: true,download: true},
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
                            <a class="deletes flex items-center text-theme-6" data-toggle="modal" data-target="#delete-modal-preview" href="javascript:;">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                            </a>
                        </div>

                        <!-- END: Modal Toggle -->
                        <!-- BEGIN: Modal Content -->
                        <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="p-5 text-center">
                                            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Are you sure?</div>
                                            <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                            <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 dark:border-dark-5 dark:text-gray-300 mr-1">Cancel</button>
                                            <button type="button" class="btn btn-danger w-24">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Modal Content -->        
                        `);
                        cash(a)
                            .find(".edit")
                            .on("click", function () {
                                alert(cell.getRow().getData().id);
                                console.log(cell.getRow().getData().id);
                            });

                        cash(a)
                            .find(".deletes")
                            .on("click", function () {
                                var id =  cell.getRow().getData().id;
                                /* axios.delete('api/marchands/'+id ,{ id : id})
                                .then(response => response)
                                .then(marchds => {
                                    console.log('Success deleted:', marchds);

                                    table.setData('api/marchandTab');
                                })
                                .catch((error) => {
                                    console.error('Error modeleElement:', error);
                                }); */
                            });
                           

                        return a[0];
                    },
                },
            ],
            renderComplete() {
                feather.replace({
                    "stroke-width": 1.5,
                });
            },
        });
        axios.get('api/marchandTab')
        .then(response => response)
        .then(marchds => {
            console.log('Success Marchands:', marchds);
            table.setData(marchds.data);
        })
        .catch((error) => {
            console.error('Error modeleElement:', error);
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