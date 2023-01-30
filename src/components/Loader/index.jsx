import React from "react";
import { ProgressBar } from "react-loader-spinner";

import "./styles.scss";

const Loader = () => {
  return (
    <div className="loader">
      <ProgressBar
        height="120"
        width="500"
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
