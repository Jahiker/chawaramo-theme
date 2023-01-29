import React, { useEffect, useState } from "react";
import { instance as axios, pageId } from "../data";

import Loader from "./Loader";
import Header from "./Header";
import Footer from "./Footer";
import { Directory } from "./Directory";

import "../styles/main.scss";

export const App = () => {
  const [loading, setLoading] = useState(true);
  const [blocks, setBlocks] = useState(null);
  const [headerData, setHeaderData] = useState(null);
  const [footerData, setFooterData] = useState(null);

  useEffect(() => {
    const getData = async () => {
      const resp = await axios.get(`/page/${pageId}`);
      const dataHeader = await axios.get(`/component/header`);
      const dataFooter = await axios.get(`/component/footer`);
      
      setLoading(false);
      setHeaderData(dataHeader.data);
      setBlocks(resp.data.content);
      setFooterData(dataFooter.data);
    };

    getData();
  }, []);

  return (
    <>
      {loading && <Loader />}
      {headerData && <Header content={headerData} />}
      {blocks &&
        blocks.map((block) => (
          <Directory content={block.content} component={block.acf_fc_layout} />
        ))}
      {footerData && <Footer content={footerData} />}
    </>
  );
};
