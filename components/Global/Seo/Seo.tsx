import React from "react";
import Head from 'next/head';
interface Props {
  seoData: any;
}
const Seo: React.FC<Props> = ({seoData}: Props) => {
  return(
    <>
      <Head>
        <title>
          {seoData.titleRaw ? seoData.titleRaw[1] : seoData.title}
        </title>
        <meta
          name="description"
          content={seoData.descriptionRaw}
          key="desc"
        />
      </Head>
    </>
  );
};

export default Seo;
