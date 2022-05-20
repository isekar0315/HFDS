const btn = document.getElementById('contactsend');

document.getElementById('contact_form')
 .addEventListener('submit', function(event) {
   event.preventDefault();

   btn.value = 'Sending...';

   const serviceID = 'default_service';
   const templateID = 'template_5s3zuy6';

 
   emailjs.sendForm(serviceID, templateID, this)
    .then(() => {
      btn.value = 'Send Email';
	  swal("Thank you for getting in touch !!!", "\nWe appreciate you contacting HFDS-San Diego. One of our colleagues will get back in touch with you soon.\n\n\nHave a Great Day!!!", "success");
	  window.setTimeout(function(){ 
		location.reload();
	  } ,5000);

	  
    }, (err) => {
      btn.value = 'Send Email';
      alert(JSON.stringify(err));
    });
	

});