function submitPost() {
    const postsContainer = document.getElementById("posts");
    const postText = document.getElementById("postText").value;
    const postImage = document.getElementById("postImage").files[0];

    if (postText || postImage) {
        const postElement = document.createElement("div");
        postElement.classList.add("post");

        postElement.innerHTML = `
            <p>${postText}</p>
            ${postImage ? `<img src="${URL.createObjectURL(postImage)}" alt="Post Image">` : ''}
            <button onclick="editPost(this)">Edit</button>
            <button onclick="deletePost(this)">Delete</button>
          <button onclick="replyToPost(this)">Reply</button>
          <button onclick="likePost(this)">Like</button>
            <span class="likes">0</span>
        `;

        postsContainer.appendChild(postElement);
        document.getElementById("postText").value = "";
        document.getElementById("postImage").value = "";
    } else {
        alert("Please provide either text or an image for your post.");
    }
}

function editPost(button) {
    const postsContainer = document.getElementById("posts");
    const postElement = button.parentElement;
    const postText = postElement.querySelector("p").innerText;

    const newText = prompt("Edit your post:", postText);

    if (newText !== null) {
        postElement.querySelector("p").innerText = newText;
    }
}

function deletePost(button) {
    const postsContainer = document.getElementById("posts");
    const postElement = button.parentElement;
    postsContainer.removeChild(postElement);
}
function replyToPost(button) {
    const postElement = button.parentElement;
    const postText = postElement.querySelector("p").innerText;

    const replyText = prompt("Reply to this post:", "");

    if (replyText !== null) {
        const replyElement = document.createElement("div");
        replyElement.classList.add("reply");
        replyElement.innerHTML = `<p>${replyText}</p>`;

        postElement.appendChild(replyElement);
    }
}
function likePost(button) {
    const likeSpan = button.parentElement.querySelector('.likes');
    let currentLikes = parseInt(likeSpan.innerText);
    likeSpan.innerText = currentLikes + 1;
}
