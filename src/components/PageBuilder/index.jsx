import React, { lazy, Suspense } from "react";

const MainSlider = lazy(() => import("../MainSlider"));
const BannerImageText = lazy(() => import("../BannerImageText"));

const PageBuilder = ({ content, component }) => {
  return (
    <Suspense fallback={<div></div>}>
      {component == "main_slider" ? <MainSlider content={content} /> : null}
      {component == "banner_image_text" ? (
        <BannerImageText content={content} />
      ) : null}
    </Suspense>
  );
};

export default PageBuilder;
