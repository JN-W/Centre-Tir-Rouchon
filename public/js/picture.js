window.onload = () => {
    // Suppression link management
    let links = document.querySelectorAll("[data-delete]")

    // loop on links
    for (link of links) {
        // clic listener
        link.addEventListener("click", function(e){
            // stop link navigation
            e.preventDefault()
            // confirm deletion
            if (confirm("Voulez vous vraiment supprimer cette image ?")){
               // send ajax request to href of link with method DELETE
               fetch(this.getAttribute("href"), {
                   method : "DELETE",
                   headers : {
                       "X-Requested-With": "XMLHttpRequest",
                       "Content-Type" : "application/json"
                   },
                   body : JSON.stringify({"_token": this.dataset.token})
              }).then(
                  // get response in json
                   response => response.json()
               ).then(
                   data => {
                       if (data.success)
                           this.parentElement.remove()
                       else
                           alert(data.error)
                   }
               ).catch(e=> alert(e))
            }

        })

    }
}