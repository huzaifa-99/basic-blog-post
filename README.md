# Basic-Blog-Post-PHP
This is my third project on web development based on core PHP and MySQL and some AJAX/Javascript. It also uses a WYSIWYG editor(CkEditor) for writing blog posts.

# Tecnologies 
  * PHP-7
  * Bootstrap-4
  * HTML
  * CSS
  * MySQL
  * AJAX/Javascript
  * CkEditor v4.13.1
  * FontAwesome v5.4.1

# Interface
The first page `index.php` will show recent posts and a simple nav bar with login, logout, signup and write-post buttons. When a user clicks on a post from the `home` page, he will be redirected to a page containing the details of the post clicked.

### Login/Signup
Login/Signup button in the navbar, onclick will trigger a modal through javascript that will show fields for login/signup, on successful operation the user will be redirected accordingly to the button clicked. These are implemented with Ajax Calls.

### Write Post
The write post button will first check if the user is logged in
 * if not, it will trigger the login modal
 * if logged in, the user will be redirected to write-post page, where he can write his blog post with the CkEditor Interface and publish his blog.
 
### Single Post
A user on a single post can
 * like react
 * heart react
 * comment
 * reply to a comment
 * delete his own comment. If he is the author of the post, he can also delete the post.
 
   **All of these features use Ajax Calls.**


# Project Installation
 * Download the project and unzip. 
 * Next, the `code` folder must be placed into the `htdocs` folder.
 * Database (in `database` folder) must be imported into MySQL for the code to function properly, Database username and password are the default ones for Xampp.
 * Finally, to run the project type the link http://localhost[:PORT_NO_IF_ANY]/ [the name of the project folder with directory]/ into the URL bar of the browser, which will take you to the index.php page. The process after that is already explained above.
 * **Note:-** I have used the CDN for CkEditor `<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>`, in case, if it does not work, i have also added `ckeditor.zip` folder(in the `code` folder) which can be linked in the `writepost.php` page.

# Project Demo
A demo video is available on [demo-video]. Previews are also available on this repo in `Previews` Folder

# More Info
The project was created 11 months before today(28/8/2020) on PHP-7.0 version, i had used Ajax for the first time in this project and i also used a WYSIWYG editor (ckeditor) for the first time in this project.
The main aim of this project was for me to understand Ajax calls and WYSIWYG-Editor implementation.
