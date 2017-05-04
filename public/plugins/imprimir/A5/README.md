1. Clone this Gist.
2. For card sizes other than A5, edit the `size` value in `@page`, and the `height` and `width` properties of `body`.
3. Add contents to each face. The simplest approach is to add an image called `front.png` of the same dimensions as the card.
4. Generate a PDF from the HTML + CSS. If using [Prince](http://www.princexml.com/), it's as simple as `prince index.html card.pdf`.
5. Take the PDF to a printer, and ask them to print as many copies as you need.