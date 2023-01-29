import React from "react";
import { ProgressBar } from "react-loader-spinner";

import "./styles.scss";

const Loader = ({ content }) => {
  return (
    <div className="loader">
      <ProgressBar
        height="100"
        width="400"
        ariaLabel="progress-bar-loading"
        wrapperStyle={{}}
        wrapperClass="progress-bar-wrapper"
        borderColor="#ff595e"
        barColor="#2274a5"
      />
    </div>
  );
};

export default Loader;
