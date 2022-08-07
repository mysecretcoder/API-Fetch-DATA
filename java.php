var PostsBtn = document.getElementById("posts-btn");
var PostsContainer = document.getElementById("posts-container");

if( PostsBtn ) {
    PostsBtn.addEventListener("click", function(){
        //console.log('CLicked');
        var ourRequest = new XMLHttpRequest();
        ourRequest.open('GET', 'http://localhost/wp-rest/wp-json/wp/v2/posts?order=asc');
        ourRequest.onload = function() {
            if(ourRequest.status >= 200 && ourRequest.status < 400) {
                var data = JSON.parse(ourRequest.responseText);
                //console.log(data);
                createHTML(data);
            } else {
                console.log('We connected to the server, but it returned an error.');
            }
        };

        ourRequest.onerror = function() {
            console.log('Connection error');
        }

        ourRequest.send();
    });
}


function createHTML( postsData ) {
    var ourHTMLString = '';
    //console.log(postsData[0].title.rendered);
    
    for( var i = 0; i < postsData.length; i++) {
        ourHTMLString += '<h2>' + postsData[i].title.rendered + '</h2>';
        ourHTMLString += postsData[i].content.rendered;
    }

    PostsContainer.innerHTML = ourHTMLString;
}