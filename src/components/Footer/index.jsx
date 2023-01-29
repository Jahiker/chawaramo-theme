import React from "react";

const Footer = ({ content }) => {
  console.log("Footer", content);
  return (
    <footer className="footer">
      <h4>Footer content</h4>
      <p>Chawaramo Soluciones Digitales - &copy </p>
    </footer>
  );
};

export default Footer;
