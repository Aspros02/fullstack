const posts = [
    {
        name: "Vincent van Gogh",
        username: "vincey1853",
        location: "Zundert, Netherlands",
        avatar: "images/avatar-vangogh.jpg",
        post: "images/post-vangogh.jpg",
        comment: "just took a few mushrooms lol",
        likes: 21
    },
    {
        name: "Gustave Courbet",
        username: "gus1819",
        location: "Ornans, France",
        avatar: "images/avatar-courbet.jpg",
        post: "images/post-courbet.jpg",
        comment: "i'm feelin a bit stressed tbh",
        likes: 4
    },
    {
        name: "Joseph Ducreux",
        username: "jd1735",
        location: "Paris, France",
        avatar: "images/avatar-ducreux.jpg",
        post: "images/post-ducreux.jpg",
        comment: "gm friends! which coin are YOU stacking up today?? post below and WAGMI!",
        likes: 152
    }
];

let articulo = document.getElementById("articulo");

let items = "";

for (let i = 0; i < posts.length; i++) {
    items += `
    <div class="encabezado">
        <img src="${posts[i].avatar}" alt="" id="avatar">
        <div class="textos">
            <p id="name">${posts[i].name}</p>
            <p id="location">${posts[i].location}</p>
        </div>
    </div>

    <img src="${posts[i].post}" alt="" id="post">

    <div class="iconos">
        <img id="heart-icon" src="images/icon-heart.png" alt="">
        <img src="images/icon-comment.png" alt="">
        <img src="images/icon-dm.png" alt="">
    </div>

    <div class="inferior">
        <p id="likes">${posts[i].likes}</p>
        <div class="comentarios">
            <p id="userName">${posts[i].username}</p>
            <p id="comment">${posts[i].comment}</p>
        </div>
    </div>
    `
}

articulo.innerHTML = items;

for (let i = 0; i < 3; i++) {
    let heartIcon = document.querySelectorAll("#heart-icon")[i];
    let likes = document.querySelectorAll("#likes")[i];
    let postImagen = document.querySelectorAll("#post")[i];

    heartIcon.addEventListener("click", function () {
        posts[i].likes += 1;
        likes.innerHTML = posts[i].likes;
    });

    postImagen.addEventListener("click", function () {
        posts[i].likes += 1;
        likes.innerHTML = posts[i].likes;
    });
}