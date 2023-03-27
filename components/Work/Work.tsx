import React from "react";
import ImageGallery from "../Common/HorizontalScrollingGallery/Gallery";
interface Props {
  workData: Array<any>;
}
const Work: React.FC<Props> = ({workData}: Props) => {
  //console.log(workData);
  return (
    <div className="w-full md:h-[calc(100vh-100px)] md:max-h-[calc(100vh-100px)] overflow-hidden bg-OffWhite">
      <div className="w-full md:px-8 px-4">
        
      </div>
      <div className="md:h-[calc(100vh-145px)] mt-2">
        <ImageGallery
          GalleryData={workData}
          BaseRoute={"/creative/work/advertising/"}
        />
      </div>
    </div>
  );
};

export default Work;
