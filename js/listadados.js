function select_data(event) {
  var data = event.textContent
  document.getElementsByName('search_box')[0].value = data
  document.getElementById('search_result').innerHTML = ''
}

function load_data(query) {
  if (query.length > 2) {
    var form_data = new FormData()
    form_data.append('query', query)

    var ajax_request = new XMLHttpRequest()

    ajax_request.open('POST', 'process_search.php')

    ajax_request.send(form_data)

    ajax_request.onreadystatechange = function () {
      if (ajax_request.readyState == 4 && ajax_request.status == 200) {
        var response = JSON.parse(ajax_request.responseText)

        var html = '<div class="list-group">'

        if (response.length > 0) {
          for (var cont = 0; cont < response.length; cont++) {
            html +=
              '<a href="#" class="list-group-item list-group-item-action" onclick="select_data(this)">' +
              response[cont].nome +
              '</a>'
          }
        } else {
          html +=
            '<a href="#" class="list-group-item list-group-item-disabled">Cliente não encontrado </a>'
        }

        html += '</div>'

        document.getElementById('search_result').innerHTML = html
      }
    }
  } else {
    document.getElementById('search_result').innerHTML = ''
  }
}
