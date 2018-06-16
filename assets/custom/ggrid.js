$(function() {
  $.ajax({
    type: "GET",
    url: "/getOrganization/"
  }).done(function(countries) {
    countries.unshift({ id: "0", name: "" });


    $("#jsGrid").jsGrid({
      height: "auto",
      width: "100%",
      filtering: true,
      inserting: true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,
      deleteConfirm: "Do you really want to delete client?",
      controller: {
        loadData: function(filter) {
          return $.ajax({
            type: "GET",
            url: "/getOrganization/",
            data: filter,
            dataType: "JSON"
          });
        },
        insertItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "addOrganization/",
            data: item
          });
        },
        updateItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "editOrganization/",
            data: item
          });
        },
        deleteItem: function(item) {
          return $.ajax({
            type: "POST",
            url: "deleteOrganization/",
            data: item
          });
        }
      },
      fields: [
        {
          name: "nama",
          title: "NAMA",
          type: "text",
          width: 50
        },
        {
          name: "kode",
          title: "KODE",
          type: "text",
          width: 150
        },
        { type: "control" }
      ]
    });
  });
});
