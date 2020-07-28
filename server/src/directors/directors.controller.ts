import {Body, Controller, Post} from '@nestjs/common';
import {DirectorsService} from "./directors.service";
import {Reziser} from "../entity/Reziser.entity";

@Controller('directors')
export class DirectorsController {
    constructor(private readonly directorsService: DirectorsService){
    }

    @Post()
    create(@Body() reziser: Reziser):  Promise<Reziser>{
        return this.directorsService.create(reziser);
    }

}
