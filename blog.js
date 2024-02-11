

document.addEventListener('DOMContentLoaded', function () {

    // let chooseMode = document.getElementById('submitChoose');
    // let searchMode = document.getElementById('submitSearch');
    
    // chooseMode.addEventListener('click', function(){
    //     chooseMode.classList.add('nowstate');
    //     searchMode.classList.remove('nowstate');
    // })
    
    // searchMode.addEventListener('click', function(){
    //     chooseMode.classList.remove('nowstate');
    //     searchMode.classList.add('nowstate');
    // })

    let articleTitles = document.querySelectorAll('.article-title');

    if (articleTitles) {
        articleTitles.forEach(function (title) {
            title.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                let url = 'display.php?id=' + id;
                window.location.href = url;
            });
        });
    }

    let createArticleButton = document.getElementById('createArticle');

    if(createArticleButton){
        createArticleButton.addEventListener('click', async function () {
            alert("Create Successfully!");
        });
    }

    let editArticleButton = document.getElementById('editArticle');

    if (editArticleButton) {
        editArticleButton.addEventListener('click',
            function () {
                document.getElementById('titleText').removeAttribute('readonly');
                document.getElementById('authorText').removeAttribute('readonly');
                document.getElementById('contentText').removeAttribute('readonly');
                
            }
        );
    }

    let saveArticleButton = document.getElementById('saveArticle');

    if (saveArticleButton) {
        saveArticleButton.addEventListener('click', async function () {
            //get the newest save time
            let f = await fetch('api.php');
            let j = await f.json();
            let updateTime = new Date(j.x);
            let updateTimeString = updateTime.toLocaleString();
            console.log(updateTimeString);

            let title = document.getElementById('titleText').value;
            let author = document.getElementById('authorText').value;
            let content = document.getElementById('contentText').value;
            let id = document.getElementById('idText').textContent;

            let formData = new FormData();
            formData.append('title', title);
            formData.append('author', author);
            formData.append('content', content);
            formData.append('id', id);
            formData.append('updateTime', updateTimeString);

            let response = await fetch('save.php', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                alert("Save Successfully!");
                window.location.href = 'home.php';
            } else {
                console.error('Save failed');
            }
        });
    }


    let deleteArticleButton = document.getElementById('deleteArticle');

    if (deleteArticleButton) {
        deleteArticleButton.addEventListener('click', async function () {
            let confirmation = confirm("Are you sure to delete this article?");

            if (confirmation) {
                let id = document.getElementById('idText').textContent;

                let formData = new FormData();
                formData.append('id', id);

                let response = await fetch('delete.php', {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    alert("Delete Successfully!");
                    window.location.href = 'home.php';
                } else {
                    console.error('Save failed');
                }

            } else {
                console.log('User clicked Cancel');
            }

        });
    }


    let deleteCommentButtons = document.querySelectorAll('.deleteComment');

    if (deleteCommentButtons) {
        deleteCommentButtons.forEach(button => {
            button.addEventListener('click', async function () {
                let confirmation = confirm("Are you sure to delete this comment?");

                if (confirmation) {
                    let commentID = button.closest('.commentItem').querySelector('.commentID').textContent;

                    let formData = new FormData();
                    formData.append('id', commentID);

                    let response = await fetch('deleteComment.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (response.ok) {
                        alert("Delete Comment Successfully!");
                        location.reload();
                    } else {
                        console.error('Save failed');
                    }

                } else {
                    console.log('User clicked Cancel');
                }
            });
        });
    }
});











