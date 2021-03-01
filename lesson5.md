# Lesson5

The code for this lesson is a typical example of a flow.

Normally after a ticket is generated the user gets an email with either a ticket in the form of a pdf, a link to get the
pdf, or both.

Since we don't do email in this lesson, I have presented tickets in the form of a list with the generated data.

When generating the ticket-pdf we include a QR Code that contains a link to a check-in page. This QR code will typically
be scanned by employees or volunteers at the entrance of the event with a handheld scanner.

We can test this ourselves by using the camera app on our mobile phones.

The check-in page checks if the ticket has already been scanned. If not, it updates the database to mark the ticket as
scanned, and the customer as checked in. A thank-you page is presented. If the ticket list is refreshed then the link to
the pdf disappears.

If the ticket was scanned before then the user - employee or volunteer is presented with an eror page.

This code is just an example, and this is not a requirement for the project
  
