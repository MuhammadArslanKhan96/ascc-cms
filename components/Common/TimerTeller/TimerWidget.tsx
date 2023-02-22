import React, { useEffect, useRef, useState } from "react";
import { DateTime } from "luxon";

const TimerWidget: React.FC = () => {
  const [times, setTimes] = useState(Array<any>);
  const colonRef = useRef(true);
  const intervalRef = useRef<any>({});

  const timeForZone = (zone: any) => {
    return DateTime.fromObject({}, { zone }).toFormat(
      colonRef.current ? "hh:mm" : "hh mm"
    );
  };

  const createTimes = () => {
    setTimes([
      {
        label: "Shanghai",
        time: timeForZone("Asia/Shanghai"),
      },
      {
        label: "Tokyo",
        time: timeForZone("Asia/Tokyo"),
      },
      {
        label: "Seoul",
        time: timeForZone("Asia/Seoul"),
      },
      {
        label: "London",
        time: timeForZone("Europe/London"),
      },
      {
        label: "Paris",
        time: timeForZone("Europe/Paris"),
      },
      {
        label: "New York",
        time: timeForZone("America/New_York"),
      },
    ]);
  };

  useEffect(() => {
    createTimes();

    intervalRef.current = setInterval(() => {
      colonRef.current = !colonRef.current;
      createTimes();
    }, 1000);

    return () => {
      clearInterval(intervalRef.current);
    };
  }, [setTimes]);
  return (
    <footer className="md:w-auto w-[95%] mx-auto md:mx-0 flex md:justify-start justify-between items-center xl:gap-[3rem] md:gap-[1.5rem] gap-3">
      {times.map(({ label, time }, k) => {
        return (
          <div
            className="flex justify-center items-start flex-col w-full flex-wrap"
            key={k}
          >
            <h4 className="font-Grotesque md:font-normal lg:text-[16px] text-[11px] leading-[20px] text-black text-start uppercase whitespace-nowrap">
              {label}
            </h4>
            <p className="font-Grotesque xxl:w-[58px] lg:w-[50px] w-[30px] font-[200] lg:text-[16px] text-[10px] leading-[20px] text-black text-start">
              {time}
            </p>
          </div>
        );
      })}
    </footer>
  );
};

export default TimerWidget;