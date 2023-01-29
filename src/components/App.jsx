import React, { useEffect, useState } from "react";
import "../styles/main.scss";
import { instance as axios, pageId } from "../data";
import { Directory } from "./Directory";

export const App = () => {
  const [loading, setLoading] = useState(true);
  const [blocks, setBlocks] = useState(null);

  useEffect(() => {
    const getData = async () => {
      const resp = await axios.get(`/page/${pageId}`);

      setLoading(false);
      setBlocks(resp.data.content);
    };

    getData();
  }, []);

  return (
    <>
      {blocks &&
        blocks.map((block) => (
          <Directory content={block.content} component={block.acf_fc_layout} />
        ))}
    </>
  );
};
