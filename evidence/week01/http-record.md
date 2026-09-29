# CIT 417 Week 1 HTTP Exchange

## W1-02 Network Inspection

URL:
http://127.0.0.1:8000/?title=Database%20Systems

Method:
GET

Status Code:
200

Content-Type:
text/html; charset=UTF-8

Other Response Header:
[Record the actual header shown in Developer Tools]

Response Phrase:
"This server-generated page introduces Database Systems."

## Explanation

The browser sends a GET request to the local PHP development server. The
server executes public/index.php. PHP reads the title parameter from the
request, trims the value and limits it to 80 bytes. The h() function encodes
the value before it is inserted into the HTML response. The server returns
the generated HTML, and the browser renders the page.

The HTTP 200 status indicates that the request received a successful
response. It does not by itself prove that the displayed data is correct,
that the visitor is authorised, or that database persistence exists.