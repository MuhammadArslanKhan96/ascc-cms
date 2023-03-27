import { NextPage } from "next";
import React from "react";
import Motion from "../Creative/TheWork/Motion/Index";
import PageTransition from "../PageTransition";

const motion: NextPage = () => {
  return (
    <>
      <PageTransition />
      <Motion />
    </>
  );
};

export default motion;
