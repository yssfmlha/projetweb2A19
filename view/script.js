let posts = [];

function addPost(title, content, author) {
  const date = new Date().toLocaleString();
  const post = {
    title,
    content,
    author,
    date
  };
  posts.push(post);
  displayPosts();
}

function displayPosts() {
  const postsList = document.getElementById('postsList');
  postsList.innerHTML = '';
  posts.forEach((post, index) => {
    const postDiv = document.createElement('div');
    postDiv.classList.add('post');
    postDiv.innerHTML = `
      <h2 class="post-title">${post.title}</h2>
      <p>${post.content}</p>
      <p class="post-details">Posted by: ${post.author} | Date: ${post.date}</p>
      <button onclick="editPost(${index})">Edit</button>
      <button onclick="deletePost(${index})">Delete</button>
    `;
    postsList.appendChild(postDiv);
  });
}

function editPost(index) {
  const newTitle = prompt('Enter new title:');
  const newContent = prompt('Enter new content:');
  if (newTitle && newContent) {
    posts[index].title = newTitle;
    posts[index].content = newContent;
    displayPosts();
  }
}

function deletePost(index) {
  posts.splice(index, 1);
  displayPosts();
}

document.getElementById('postForm').addEventListener('submit', function(event) {
  event.preventDefault();
  const title = document.getElementById('postTitle').value;
  const content = document.getElementById('postContent').value;
  const author = document.getElementById('postAuthor').value;
  if (title && content && author) {
    addPost(title, content, author);
    document.getElementById('postTitle').value = '';
    document.getElementById('postContent').value = '';
    document.getElementById('postAuthor').value = '';
  } else {
    alert('Please fill in all fields');
  }
});

displayPosts();