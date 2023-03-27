import React from "react";
import Image from "next/image";
interface Props {
  bio: String
  image:any
  instagramUrl: any
  contactEmail: any
};
const Bio: React.FC<Props> = ({bio,image,instagramUrl,contactEmail}: Props) => {
  return (
    <div className="w-full h-full bg-OffWhite md:mt-8 mt-6">
      <div className="w-full max-w-[1360px] m-auto md:px-8 px-4 flex justify-center items-center md:flex-row flex-col md:gap-16 gap-6">
        <div className="md:w-[372px] w-full md:h-[468px] h-[460px] relative md:-mt-6">
          {image &&
            <Image
              src={image}
              alt="Artist"
              fill
              className="object-cover"
            />
          }
        </div>
        <div className="md:w-[calc(100%-372px)] flex justify-center items-center flex-col">
          <div className="font-Grotesque font-[300] md:text-[13px] text-[11px] md:leading-[27px] leading-[20px] tracking-[0.5%] " >
            <p>{bio}</p>
          </div>
          <div className="flex justify-center items-center gap-6 my-8">
            {instagramUrl && 
            <a
              href={instagramUrl}
              target={"_blank"}
              className="font-Grotesque font-medium md:text-[18px] text-[16px] leading-[20px] uppercase underline"
            >
              INSTAGRAM
            </a>
            }
            {contactEmail && 
              <a
                href={contactEmail}
                target={"_blank"}
                className="font-Grotesque font-medium md:text-[18px] text-[16px] uppercase underline"
              >
                CONTACT AGENT
              </a>
            }
          </div>
        </div>
      </div>
    </div>
  );
};

export default Bio;
