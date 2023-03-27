import React from "react";
import ImageGallery from "../../Common/HorizontalScrollingGallery/Gallery";
import { Data } from "../../../JSON/Data";
import { useRouter } from "next/router";
interface Props {
  work:Array<any>
};
const Index: React.FC<Props> = ({work}: Props) => {
  return (
    <div className="w-full h-full mt-4 md:pb-2">
      <ImageGallery
        GalleryData={work}
        BaseRoute={"/artist/work/"}
      />
    </div>
  );
};

export default Index;


