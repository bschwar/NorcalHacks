<?php
require_once("model.php");
	require("header.php");
	
	
?>
<h1 id="center3">About Aristotle's Classroom</h1>
<?php
$str= "	This weekend we created the web platform, Aristotle’s Classroom, with the intention of modifying the way that virtual education occurs. With this web application, teachers are able to swiftly communicate with their students through a live chat feature. As well, this user-friendly platform allows teachers to utilize an efficient grading system with a variety of educational resources that can be modified and accessed by both teachers and students. While being a practical alternative to educational web apps, Aristotle’s Classroom also includes entertaining, grade-specific games, such as a Choose Your Own Adventure story; Matching Games; Door Mazes; and Flashcards; that are all utilized to help aid students with their ability to grasp new knowledge in an engaging and educational way. There are two types of Aristotle Classroom accounts; teachers and students. When creating an account, teachers are given a class-id. Once shared, students have the ability to enter the class-id which automatically enrolls them in the entirely virtual classroom experience!
<br/>
<br/>
Going more into detail about the code utilized in Aristotle’s Classroom, the basics of the live chat system were created through the usage of a textbox located underneath the 'chat box', made from JavaScript. When text is entered in the textbox, the data is stored into a SQL Database along with a timestamp and initial value of 0. Every 10 milliseconds, the chat box is refreshed and any new data found in the SQL Table is printed with the newest data appearing at the bottom of the chatbox. Using Javascript, a section of the website is refreshed, while the rest of the webpage remains static. This allows messages in chat to remain more than 10 milliseconds. We were able to organize the chatbox this way by reversing the order of the data in the SQL Table, then flipping it in the HTML. The announcements system uses the same SQL Table and method, however, the text has a value of 1. If text entries begin to exceed the length of the chatbox, a scroll bar appears. 
<br/>
<br/>
In addition to the live chat feature, teachers are able to create assignments, which include a name, description, due date, and a file. An assignment can be uploaded to the teacher’s current class, as well as other classes if they have access to the other class-ids. The assignment’s input data is stored in a SQL Table and displayed to the students. Students can view it and directly submit a file of their work, which is then kept in a SQL table. From there, teachers can access a details page to view work submitted by the students and grade it. Students can access their grades and view assignments they turned in the same way. Teachers can also access their students' grades through a table which allows them to easily copy and paste any grades into any online grade book.
<br/>
<br/>
The final feature of the classroom is the database tab. This is where teachers can upload any information that would be useful for their students throughout the school year and organize it by units. The website does this organization by ordering the SQL database and then, checking each row to see when the units change. If the unit of the current row is different than the one before there is a break in the output and the title of the new unit is shown.
<br/>
<br/>
The games section of the website promotes learning through a multitude of means. There are matching games, flashcards, a maze game, and a choose your own adventure game. All of these promote learning in different ways and can be used as assignments for the classroom section of the website.
<br/>
<br/>
In total, this website allows for easy communication between students and teachers. Unlike other digital classrooms like Edmodo and Google Classroom, this site replaces the “stream” with a chatroom between students and the rest of the class which allows for quicker responses because of the increased visibility. There is also an organized to-do list for the students, and the teachers have the ability to separate out any important messages. The grading of assignments is quick and easy, and all the data is compatible with virtual grade books. Finally, this website allows teachers to build a database of resources for their students to use and to help students outside the physical classroom.";
 echo "<p>$str</p>";
	
	require("footer.php");
